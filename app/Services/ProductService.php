<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function findProductById($id)
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
    public function getProductsByCategory($categoryId)
    {
        return Product::where('categoryId', $categoryId)->paginate(10);
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
        $product->active = false;
        // xử lý image
        $file_name = time() . '.' . $data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('images_upload'), $file_name);
        $product->image = $file_name;
        $product->save();
        return $product;
    }

    public function updateProduct($id, $data)
    {
        $product = $this->findProductById($id);
        // xử lý image
        $product->update($data);
        $file_name = time() . '.' . $data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('images_upload'), $file_name);
        $product->image = $file_name;
        $product->save();
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);
        if($product->stock == 0 && $product->active == 0){
            return $product->delete();
        }
    }

    public function getAllProducts()
    {
        return Product::all();
    }
    public function getQuery()
    {
        return Product::query();
    }
}