<?php

namespace App\Models;
use App\Models\House;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class House_type extends Model
{
    public function houses()
    {
        return $this->hasMany(House::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
