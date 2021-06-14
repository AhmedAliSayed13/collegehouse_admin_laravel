<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parent_information extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address1', 'address2', 'city_id', 'state_id', 'zip', 'phone', 'email', 'Position', 'place_employment'
         
        ];
}
