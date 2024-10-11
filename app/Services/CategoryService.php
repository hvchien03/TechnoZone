<?php
namespace App\Services;
use App\Models\Category;
class CategoryService
{
    public function getCateById($id)
    {
        if ($id == null) {
            throw new \Exception('Id is required');
        }
        $cate = Category::find($id);
        if ($cate == null) {
            throw new \Exception('Category not found');
        }
        return $cate;
    }

    public function getAllCate()
    {
        return Category::all();
    }
}