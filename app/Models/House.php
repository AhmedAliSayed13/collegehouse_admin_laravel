<?php

namespace App\Models;
use App\Models\House_type;
use App\Models\Payment_method;
use App\Models\Front_house_image;
use App\User;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function house_type()
    {
        return $this->belongsTo(House_type::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class);
    }
    public function front_house_images()
    {
        return $this->hasMany(Front_house_image::class);
    }
}
