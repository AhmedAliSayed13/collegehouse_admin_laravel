<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meeting;
class Meeting_case extends Model
{
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
