<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Terpx_product;
use App\User;
class Terpx_favourite extends Model
{
    

    public function products()
    {
        return $this->hasMany(Terpx_product::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
