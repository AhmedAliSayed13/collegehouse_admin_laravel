<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terpx_product extends Model
{
    protected $fillable = ['title','price','describe','date','location','image','category_id','type_id'];



    public function user()
    {
        return $this->belongsTo(Terpx_user::class);
    }
    public function attributes()
    {
        return $this->hasMany(Terpx_attribute::class,'product_id');
    }
    public function images()
    {
        return $this->hasMany(Terpx_image::class,'product_id');
    }
}
