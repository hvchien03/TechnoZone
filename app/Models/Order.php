<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Order extends Model //đơn đặt hàng
{
    use HasFactory;
    protected $table = 'order';
    protected $connection = 'mongodb';
    public $fillable = [
        'userId',
        'orders =>array'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', '_id');
    }
    public function requests()
    {
        return $this->hasMany(Request::class, 'order.orderId');
    }
}
