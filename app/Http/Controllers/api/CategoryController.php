<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terpx_category;
class CategoryController extends Controller
{
    public function index(){
        return Terpx_category::all();
    }
 
    public function show($id){
        return Terpx_category::find($id);
    }

    public function store(Request $request){

        $validation = Validator::make(Request::all(),[
            'title' => 'required|unique:terpx_categories,title',
            'parent_id' => 'nullable|integer',
        ]);
    
        if($validation->fails()){
            return $validator->messages();
        }else{
            return Terpx_category::create($request->all());
        }
        
    }

    public function update(Request $request, $id)
    {
        $type = Terpx_category::findOrFail($id);
        $type->update($request->all());

        return $type;
    }

    public function delete(Request $request, $id)
    {
        $type = Terpx_category::findOrFail($id);
        $type->delete();

        return 204;
    }
}
