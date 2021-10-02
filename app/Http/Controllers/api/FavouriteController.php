<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Terpx_attribute;
use App\Models\Terpx_favourite;
use App\Models\Terpx_product;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class FavouriteController extends Controller
{
    public function favourite_user(){

        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['user_not_found'], 404);
        } else {
           
            $favourites = Terpx_favourite::where('user_id', $user->id)->paginate(10);
            $list=[];
            foreach($favourites as $favourite){
                array_push($list,$favourite->product_id);
            }
           
            $products=[];
            if(!empty($list)){
                $products=Terpx_product::whereIn('id',$list)->get();
                
            }
           
            return response()->json(compact('products'), 200);
        }
    }


    public function favourite_product($id){

       

        
           
            $favourites = Terpx_favourite::where('product_id', $id)->paginate(10);
            $list=[];
            foreach($favourites as $favourite){
                array_push($list,$favourite->user_id);
            }
           
            $users=[];
            if(!empty($list)){
                $users=User::whereIn('id',$list)->get();   
            }
            return response()->json(compact('users'), 200);
        
    }
}
