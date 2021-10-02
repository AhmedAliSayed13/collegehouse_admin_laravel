<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\House;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable 
{
    use Notifiable;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name' ,'email', 'phone','address','state','city_id','zip','role_id','password','created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function getJWTIdentifier()
    // {
    //   return $this->getKey();
    // }

    // public function getJWTCustomClaims()
    // {
    //   return [];
    // }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function fullname()
    {
        return $this->first_name.' '.$this->last_name ;
    }
    public function houses()
    {
        return $this->hasMany(House::class, 'owner_id',);
    }
}
