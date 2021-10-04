<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;



class Terpx_user 
{
    use Notifiable;

    protected $table = 'terpx_users';
    protected $fillable = ['name','email','phone','address','postal_code','password'];

    protected $guard = "terpx_user";

    public function products()
    {
        return $this->hasMany(Terpx_product::class);
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
 
   
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
   
    public function getJWTCustomClaims()
    {
        return [];
    }


     
    protected $hidden = [
        'password', 'remember_token',
    ];
}

