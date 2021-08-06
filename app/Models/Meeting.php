<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Meeting_case;
class Meeting extends Model
{
    public function application()
    {
        return $this->hasOne(Application::class);
    }
    public function meeting_case()
    {
        return $this->belongsTo(Meeting_case::class);
    }
}
