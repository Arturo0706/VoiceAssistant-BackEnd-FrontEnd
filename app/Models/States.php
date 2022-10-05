<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    //Relations

    public function direcciones()
    {
        return $this->hasMany(Address::class);
    }




}
