<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model //sản phẩm
{
    use HasFactory;
    protected $table = 'product';
    protected $connection = 'mongodb';
    protected $fillable = [
        'productName',// tên sản phẩm
        'image',// ảnh sản phẩm
        'supplierId',// id của nhà cung cấp
        'categoryId',// id của loại sản phẩm
        'configuration',// mô tả cấu hình sản phẩm
        'price',// giá sản phẩm
        'stock',// số lượng tồn kho
        'warrantyPeriod',// thời gian bảo hành
        'warrantyPolicy',// chính sách bảo hành
        'active', //true false
    ];

    public function formaterPriceAttribute()
    {
        return number_format($this->price, 0, '.', ',') . ' VND';
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierId', '_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', '_id');
    }
}
