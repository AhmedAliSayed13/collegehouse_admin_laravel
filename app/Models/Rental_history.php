<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
use App\Models\Application;
class Rental_history extends Model
{
    public function city()
        {
            return $this->belongsTo(City::class);
        }
        public function state()
        {
            return $this->belongsTo(State::class);
        }
        public function application()
        {
            return $this->belongsTo(Application::class);
        }
}
