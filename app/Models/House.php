<?php

namespace App\Models;
use App\Models\House_type;
use App\Models\Payment_method;
use App\Models\Front_house_image;
use App\Models\Flooer;
use App\User;
use App\Models\House_state;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lease_form;

class House extends Model
{
    public function house_type()
    {
        return $this->belongsTo(House_type::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }
    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class);
    }
    public function front_house_images()
    {
        return $this->hasMany(Front_house_image::class);
    }
    public function flooers()
    {
        return $this->hasMany(Flooer::class);
    }
    public function house_state()
    {
        return $this->belongsTo(House_state::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function lease_forms()
    {
        return $this->hasMany(Lease_form::class);
    }
}
