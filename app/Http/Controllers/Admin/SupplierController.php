<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Services\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $_supplierService)
    {
        $this->supplierService = $_supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->getAllSupplier();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        if (request()->isMethod('get')) {
            return view('admin.supplier.create');
        } elseif (request()->isMethod('post')) {
            $request = app(SupplierRequest::class);
            $data = $request->validated();
            try {
                $supplier = $this->supplierService->createSupplier($data);
                return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function update($id)
    {
        if (request()->isMethod('get')) {
            $supplier = $this->supplierService->getSupplierById($id);
            return view('admin.supplier.update', compact('supplier'));
        } elseif (request()->isMethod('put')) {
            $request = app(SupplierRequest::class);
            $data = $request->validated();
            try {
                $supplier = $this->supplierService->updateSupplier($id, $data);
                return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->supplierService->deleteSupplier($id);

            // Kiểm tra xem có phải là yêu cầu AJAX không
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Supplier deleted successfully!']);
            }

            // Nếu không phải AJAX thì thực hiện redirect
            return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}