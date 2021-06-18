<?php

namespace App\Models;
use App\Models\House;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    public function house()
    {
        return $this->hasMany(House::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    
}
