<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Terpx_attribute;
use App\Models\Terpx_image;
use App\Models\Terpx_product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use  DB;

class ProductController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $products = Terpx_product::where('end_date', '<', $today)->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json(compact('products'), 200);
    }
    public function show($id)
    {
        $product = Terpx_product::find($id);
         $user = $product->user;
         $attrbutes = $product->attributes;
         $images = $product->images;
        
        return response()->json(compact('product'), 200);
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['user_not_found'], 404);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'price' => 'required|integer',
                'describe' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'location' => 'required|string',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,jpeg,svg|max:2048',
                'category_id' => 'required|integer',
                'type_id' => 'required|integer',
                'plan_id' => 'required|integer',

                'key.*' => 'required|string',
                'value.*' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $product = new Terpx_product();
                $product->title = $request->title;
                $product->price = $request->price;
                $product->describe = $request->describe;
                $product->start_date = $request->start_date;
                $product->end_date = $request->end_date;
                $product->location = $request->location;
                $product->category_id = $request->category_id;
                $product->type_id = $request->type_id;
                $product->plan_id = $request->plan_id;
                $product->user_id = $user->id;
                $product->save();
                $count = 0;
                foreach ($request->image as $image) {
                    $image_name = time() . $count . 'image.' . $image->getClientOriginalExtension();
                    $image->move(public_path('terpx\uploads'), $image_name);
                    $image = new Terpx_image();
                    $image->name = $image_name;
                    $image->product_id = $product->id;
                    $image->save();
                    $count++;
                }

                for ($i = 0; $i < count($request->key); $i++) {

                    $attribute = new Terpx_attribute();
                    $attribute->key = $request->key[$i];
                    $attribute->value = $request->value[$i];
                    $attribute->product_id = $product->id;
                    $attribute->save();
                }
               return response()->json('product created', 201 );

            }
        }

    }

   

    public function delete(Request $request, $id)
    {

        
        DB::table('terpx_attributes')->where('product_id', $id)->delete();
        $images = Terpx_image::where('product_id', $id)->get();
        foreach ($images as $image) {
            @unlink('terpx/uploads/'.$image->name);
            $image->delete();
        }

       
        
       

        $product = Terpx_product::findOrFail($id);

        $product->delete();
        
        

        return response()->json('product deleted', 200 );
    }
}
