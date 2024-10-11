<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Category extends Model //danh mục sản phẩm
{
    use HasFactory;
    protected $table = 'category';
    protected $connection = 'mongodb';
    protected $fillable = [
        'categoryName',
        'description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId', '_id');
    }
}
