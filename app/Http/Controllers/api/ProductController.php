<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Terpx_product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Terpx_product::orderBy('date', 'DESC')->paginate(10);
    }
    public function show($id)
    {
       $product= Terpx_product::find($id);
       $user=$product->user;
       $attrbutes=$product->attributes;
       $images=$product->images;
        // $data=[
        //     'product'=>$product,
        //     'user'=>$user,
        //     'attrbutes'=>$attrbutes
        // ];
        return $product;
    }

    public function store(Request $request)
    {

        $validation = Validator::make(Request::all(), [
            'title' => 'required',
            'price' => 'required|integer',
            'describe' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'user_id' => 'required|integer',
            'key.*' => 'required|string',
            'value.*' => 'required|string',
        ]);

        if ($validation->fails()) {
            return $validator->messages();
        } else {
            $product=new Terpx_product();
            $product->title=$request->title;
            $product->price=$request->price;
            $product->describe=$request->describe;
            $product->date=$request->date;
            $product->location=$request->location;
            $product->category_id=$request->category_id;
            $product->type_id=$request->type_id;
            $product->plan_id=$request->plan_id;
            $product->user_id=$request->user_id;
            $product->save();

        }

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make(Request::all(), [
            'title' => 'required',
            'price' => 'required|integer',
            'describe' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|integer',
            'type_id' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return $validator->messages();
        } else {
            $type = Terpx_product::findOrFail($id);
            $type->update($request->all());
            return $type;
        }

    }

    public function delete(Request $request, $id)
    {
        $type = Terpx_product::findOrFail($id);
        $type->delete();

        return 204;
    }
}
