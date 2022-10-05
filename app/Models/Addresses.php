<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'suburb',
        'street',
        'street_numer',
        'home_number',
        'references',
        'phone',
        'state_id',
        'municipality_id',
        'user_id'
    ];

    //N:1 

    public function states()
    {
        return $this->belongsTo(States::class);
    }

    //N:1

    public function municipalities()
    {
        return $this->belongsTo(Municipalities::class);
    }

    //1:N

    public function order()
    {
        return $this->hasMany(Order::class);
    }

     //N:1

     public function user()
     {
         return $this->belongsTo(User::class);
     }







}
