<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Warranty extends Model //bảo hành
{
    use HasFactory;
    protected $collection = 'warranty';
    protected $connection = 'mongodb';
    public $fillable = [
        'productId',
        'purchaseHistoryId', //id lịch sử mua hàng
    ];
}
