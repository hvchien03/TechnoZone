<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Order extends Model //đơn đặt hàng
{
    use HasFactory;
    protected $collection = 'order';
    protected $connection = 'mongodb';
    public $fillable = [
        'userId',
        'orders', // 1 người dùng có nhiều đơn đặt hàng
        // cấu trúc trong orders [
        //                          {
        //                              orderId,
        //                              name, 
        //                              phone, 
        //                              address, 
        //                              products: [
        //                                              {productId, name, quantity, price}, {}, {}, ...
        //                                        ], 
        //                              date, 
        //                              total, 
        //                              deliveryStatus, 
        //                              paymentStatus
        //                           }, {}, {}, ...  
        //]
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', '_id');
    }
}
