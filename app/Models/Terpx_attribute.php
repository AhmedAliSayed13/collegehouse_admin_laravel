<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Terpx_attribute extends Model
{
    public function product()
    {
        return $this->belongsTo(Terpx_product::class,'product_id');
    }
}
