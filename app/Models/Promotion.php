<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Promotion extends Model //khuyến mãi
{
    use HasFactory;
    protected $collection = 'promotion';
    protected $connection = 'mongodb';
    public $fillable = [
        'promotionName',
        'discount',
        'startDate',
        'endDate',
        'status',
        'products' //chứa [] mảng các id sản phẩm được khuyến mãi
    ];
}
