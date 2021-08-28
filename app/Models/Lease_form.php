<?php

namespace App\Models;
use App\Models\House;
use Illuminate\Database\Eloquent\Model;

class Lease_form extends Model
{
    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
