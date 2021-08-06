<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
use App\Models\Application;
class Employment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id', 'employer_name', 'phone', 'email'
        , 'address1'
        , 'address2'
        , 'city_id'
        , 'zip'
        , 'state_id'
        , 'position'
        , 'monthly_gross_salary'
        , 'current_work'
        , 'employment_date_start'
        , 'supervisor_first_name'
        , 'supervisor_last_name'
        , 'supervisor_title'
        ];

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
