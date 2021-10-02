<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terpx_type;

class TypeController extends Controller
{

    public function index()
    {
        return Terpx_type::all();
    }
 
    public function show($id)
    {
        return Terpx_type::find($id);
    }

    public function store(Request $request)
    {
        return Terpx_type::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $type = Terpx_type::findOrFail($id);
        $type->update($request->all());

        return $type;
    }

    public function delete(Request $request, $id)
    {
        $type = Terpx_type::findOrFail($id);
        $type->delete();

        return response()->json('plan deleted', 204);
    }
}
