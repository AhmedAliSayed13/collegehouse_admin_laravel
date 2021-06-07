<?php

namespace App\Models;
use App\Models\House;

use Illuminate\Database\Eloquent\Model;

class Front_house_image extends Model
{
    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
