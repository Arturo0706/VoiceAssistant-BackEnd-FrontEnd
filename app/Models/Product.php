<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price'

    ];

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class);
    }


    public function imageable()
    {
        return $this->morphTo();
    }

}
