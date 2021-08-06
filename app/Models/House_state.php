<?php

namespace App\Models;
use App\Models\House;
use Illuminate\Database\Eloquent\Model;

class House_state extends Model
{
    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
