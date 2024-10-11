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
}