<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Parent_information;
use App\Models\Rental_history;
use App\Models\Employment;
use App\Models\House;
class City extends Model
{
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function parent_informations()
    {
        return $this->hasMany(Parent_information::class);
    }
    public function rental_historys()
    {
        return $this->hasMany(Rental_history::class);
    }
    public function employments()
    {
        return $this->hasMany(Employment::class);
    }
    public function house(){
        return $this->hasMany(House::class,'city_id');
    }
}
