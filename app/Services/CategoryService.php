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
    public function createCategory($data)
    {
        $category = new Category();
        $category->categoryName = $data['categoryName'];
        $category->description = $data['description'] ?? null;
        $category->save();
        return $category;
    }

    public function updateCategory($id, $data)
    {
        $category = $this->getCateById($id);
        $category->categoryName = $data['categoryName'];
        $category->description = $data['description'] ?? null;
        $category->save();
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCateById($id);
        return $category->delete();
    }
}