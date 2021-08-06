<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TagController extends Controller
{
    public function index(TagsDataTable $tag)
    {
        return $tag->render('admin.tags.index',['title'=>'admin title']);
    }

    public function create()
    {
        return view('admin.tags.create-Tag');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>['required','string','unique:tags'],

        ]);
        $tag=new Tag();
        $tag->name=$request->name;
        $tag->save();
        return Redirect::back()->with('success', 'Created Account Tag Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id){
        $tag=Tag::find($id);
        return view('admin.tags.edit-Tag',compact('tag'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>['required','string','unique:tags,name,'.$id],

        ]);
        $tag=Tag::find($id);
        $tag->name=$request->name;
        $tag->save();
        return Redirect::back()->with('success', 'Updated Tag Successfully');

    }

    public function destroy($id)
    {
        $tag=Tag::Find($id);
        $tag->delete();
        return Redirect::back()->with('success', 'Deleted Tag Successfully');
    }

}
