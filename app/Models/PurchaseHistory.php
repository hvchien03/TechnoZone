<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class PurchaseHistory extends Model //lịch sử mua hàng
{
    use HasFactory;
    protected $table = 'purchasehistory';
    protected $connection = 'mongodb';
    public $fillable = [
        'userId',
        'orders', //chứa [] mảng các đơn hàng
        // [
        //     {
        //             'orderId': 'user12345608102024',
        //             'name': 'Nguyễn Văn B',
        //             'phone': '1234567890',
        //             'address': 'Long An',
        //             'date': '08-10-2024 11:14',
        //             'products': [
        //                    {
        //                      "productId": 'product123',
        //                      "quantity": 1,
        //                      "price": 2400
        //                    }, {}
        //              ],
        //              'total', 
        //              'deliveryStatus', 
        //              'paymentStatus'
        //        }, {}, {}, ...
        // ]
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', '_id');
    }
}
