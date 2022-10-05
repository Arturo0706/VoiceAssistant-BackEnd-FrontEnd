<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'subtotal',
        'user_id',
        'address_id'
    ];

    //N:1

    public function address()
    {
        return $this->belongsTo(Addresses::class);
    }


    //N:1

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //1:N

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class);
    }
}
