<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
class Room_type extends Model
{
    //
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
