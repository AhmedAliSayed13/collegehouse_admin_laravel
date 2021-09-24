<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terpx_category;
class UserController extends Controller
{
    public Function GetCategory(){
        $category=Terpx_category::all();
    }
}
