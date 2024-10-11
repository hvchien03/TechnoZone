<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProductById($id)
    {
        if ($id == null) {
            throw new \Exception('Id is required');
        }
        $product = Product::find($id);
        if ($product == null) {
            throw new \Exception('Product not found');
        }
        return $product;
    }

    public function createProduct($data)
    {
        $product = new Product();
        $product->productName = $data['productName'];
        $product->supplierId = $data['supplierId'];
        $product->categoryId = $data['categoryId'];
        $product->configuration = $data['configuration'];
        $product->price = (int)$data['price'];
        $product->stock = (int)$data['stock'];
        $product->warrantyPeriod = (int)$data['warrantyPeriod'];
        $product->warrantyPolicy = $data['warrantyPolicy'];
        // xử lý image
        $file_name = time() . '.' . $data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('images_upload'), $file_name);
        $product->image = $file_name;
        $product->save();
        return $product;
    }

    public function updateProduct($id, $data)
    {
        $product = $this->getProductById($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->getProductById($id);
        return $product->delete();
    }

    public function getAllProducts()
    {
        return Product::all();
    }
}
