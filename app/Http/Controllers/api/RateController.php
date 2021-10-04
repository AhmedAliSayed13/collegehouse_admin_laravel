<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Terpx_attribute;
use App\Models\Terpx_image;
use App\Models\Terpx_rate;
use App\User;
use App\Models\Terpx_product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class RateController extends Controller
{
   

    public function index()
    {
       
        $rates = Terpx_rate::paginate(10);
        return response()->json(compact('rates'), 200);
    }
    public function show($id)
    {
        $rates = Terpx_rate::where('product_id',$id)->get();
        // $rate=$rate->user;

        return response()->json(compact('rates'), 200);
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['user_not_found'], 404);
        } else {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|integer',
                'value' => 'required|integer|min:1|max:5',
                'comment' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $product=Terpx_product::find($request->product_id);
                $rate = new Terpx_rate();
                $rate->owner_user_id=$product->user_id;
                $rate->product_id = $request->product_id;
                $rate->value = $request->value;
                $rate->comment = $request->comment;
                $rate->user_id = $user->id;
                $rate->save();
               
                

               
                return response()->json('rate created', 201);

            }
        }

    }

    public function delete(Request $request, $id)
    {

         

        $rate = Terpx_rate::findOrFail($id);

        $rate->delete();

        return response()->json('rate deleted', 200);
    }
}
