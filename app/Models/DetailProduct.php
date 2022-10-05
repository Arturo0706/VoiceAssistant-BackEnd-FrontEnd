<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'size_id',
        'product_id',
    ];


    public function products()
       {
        return $this->belongsToMany(Products::class)->withPivot('price')->withTimestamps();
       }
    
}
