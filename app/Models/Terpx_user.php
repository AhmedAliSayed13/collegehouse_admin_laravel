<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Terpx_user extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'terpx_users';
    protected $fillable = ['name','email','phone','address','postal_code','password'];

    protected $guard = "terpx_user";

    public function products()
    {
        return $this->hasMany(Terpx_product::class);
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
