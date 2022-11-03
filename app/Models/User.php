<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_last_name',
        'second_last_name',
        'email',
        'password',
        'rol_id',
        'address_id'

    ];
    const ADMIN = 1;
    const CLIENTE = 2;
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //1:N
  
 public function addresses()
 {
     return $this->belongsTo(User::class);
 }

    //1:N
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    //N:1
    public function roles()
    {
        return $this->belongsTo(Roles::class);
    }

    // protected $appends = ['avatar'];

    // public function getAvatarAtribute(){
    //     return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this -> email)));
    // }


}
