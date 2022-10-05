<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'total',
        'order_id',
        'product_id'
    ];

    //N:1

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //N:1

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
