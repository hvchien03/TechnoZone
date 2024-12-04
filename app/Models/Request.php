<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'requests';
    protected $fillable = [
        'userId',
        'order',
        'requestDetails'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'order.date' => 'date',
        'requestDetails.requestedDate' => 'datetime',
        'requestDetails.actions.*.scheduledDate' => 'datetime'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function updateStatus($status, $note = null)
    {
        $details = $this->requestDetails;
        $details['status'] = $status;
        if ($note) {
            $details['note'] = $note;
        }

        return $this->update([
            'requestDetails' => $details
        ]);
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order.orderId');
    }
}
