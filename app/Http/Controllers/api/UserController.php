<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terpx_category;
use App\Models\Terpx_type;
class UserController extends Controller
{
    public function GetTypes()
    {
        return Terpx_type::all();
    }
    public Function GetCategories(){
        return Terpx_category::all();
    }
}
