<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Supplier extends Model //nhà cung cấp
{
    use HasFactory;
    protected $table = 'supplier';
    protected $connection = 'mongodb';
    protected $fillable = [
        'supplierName',
        'hotline',
        'email',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'supplierId', '_id');
    }
}
