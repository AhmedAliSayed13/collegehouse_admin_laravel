<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Terpx_rate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function owner_user()
    {
        return $this->belongsTo(User::class,'owner_user_id','id');
    }
}
