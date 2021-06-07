<?php

namespace App\Models;
use App\Models\House;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    public function house()
    {
        return $this->hasMany(House::class);
    }
    
}
