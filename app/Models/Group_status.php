<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
class Group_status extends Model
{
    protected $table = 'group_statuss';

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
