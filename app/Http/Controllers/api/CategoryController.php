<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terpx_category;
class CategoryController extends Controller
{
    public function index(){
        $category=Terpx_category::all();
        return response()->json(compact('category'), 200);
    }
 
    public function show($id){
        $category=Terpx_category::find($id);
        return response()->json(compact('category'), 200);
    }

    public function store(Request $request){

        $validation = Validator::make(Request::all(),[
            'title' => 'required|unique:terpx_categories,title',
            'parent_id' => 'nullable|integer',
        ]);
    
        if($validation->fails()){
            return $validator->messages();
        }else{
            $category= Terpx_category::create($request->all());
            return response()->json(compact('category'), 200);
        }
        
    }

    public function update(Request $request, $id)
    {
        $category = Terpx_category::findOrFail($id);
        $category->update($request->all());

        return response()->json(compact('category'), 200);
    }

    public function delete(Request $request, $id)
    {
        $type = Terpx_category::findOrFail($id);
        $type->delete();

        return response()->json('category deleted', 204);
    }
}
