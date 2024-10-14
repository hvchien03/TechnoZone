<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Promotion extends Model //khuyến mãi
{
    use HasFactory;
    protected $table = 'promotion';
    protected $connection = 'mongodb';
    public $fillable = [
        'promotionName',
        'description',
        'discount',
        'startDate',
        'endDate',
        'status',
        'products' //chứa [] mảng các id sản phẩm được khuyến mãi
    ];

    public function countProduct(){
        return count($this->products);
    }

    // public function getPromotionalProducts()
    // {
    //     return Product::whereIn('id', $this->products)->get();
    // }
}
