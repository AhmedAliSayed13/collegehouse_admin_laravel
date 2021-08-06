<?php

namespace App\Http\Controllers\tennat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
class GroupController extends Controller
{
    public function createGroup(){
        $cities=City::all();
        return view('tenant.create-group',compact('cities'));
    }
}
