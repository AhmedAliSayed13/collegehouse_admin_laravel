<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terpx_image extends Model
{
    protected $table = 'terpx_images';
    protected $fillable = ['name','product_id'];
    
    public function product()
    {
        return $this->belongsTo(Terpx_product::class,'product_id');
    }
}
