<?php
namespace App\Services;
use App\Models\Supplier;
class SupplierService
{
    public function getSupplierById($id)
    {
        if ($id == null) {
            throw new \Exception('Id is required');
        }
        $supplier = Supplier::find($id);
        if ($supplier == null) {
            throw new \Exception('Supplier not found');
        }
        return $supplier;
    }

    public function getAllSupplier()
    {
        return Supplier::all();
    }
    public function createSupplier($data)
    {
        $supplier = new Supplier();
        $supplier->supplierName = $data['supplierName'];
        $supplier->hotline = $data['hotline'];
        $supplier->email = $data['email'];
        $supplier->save();
        return $supplier;
    }

    public function updateSupplier($id, $data)
    {
        $supplier = $this->getSupplierById($id);
        $supplier->update($data);
        return $supplier;
    }

    public function deleteSupplier($id)
    {
        $supplier = $this->getSupplierById($id);
        return $supplier->delete();
    }

}