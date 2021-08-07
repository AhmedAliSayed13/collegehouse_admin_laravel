<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','zailcode','email', 'name','application_id'];



    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    
    public function meetings()
    {
        return $this->hasOne(Meeting::class);
    }
}
