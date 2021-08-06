<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OwnersDataTable;
use App\Models\Front_house_image;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\House;
use App\Models\Flooer;
use App\Models\House_type;
use App\Models\Payment_method;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function index(OwnersDataTable $owner)
    {
        return $owner->render('admin.owners.index', ['title' => 'admin title']);
    }

    public function create()
    {
        $cities=City::all();
        return view('admin.owners.create-owner',compact('cities'));
       
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric','unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'integer'],
            'zip' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

     
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'role_id' => 2,
            'zip' => $request->zip,
            'email' => $request->email,
            'state' => $request->state,
            'password' => Hash::make($request->password)
        ]);
        $success="Add Rental Owner Successfully";
        return  back()->with('success',$success);
       
       



        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $owner = User::find($id);
        $cities = City::all();
        
        return view('admin.owners.edit-Owner', compact('owner', 'cities'));
    }
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric','unique:users,phone,'. $id],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'integer'],
            'zip' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:8'],
        ]);

     
        $owner=User::find($id);
        $owner->first_name=$request->first_name;
        $owner->last_name=$request->last_name;
        $owner->phone=$request->phone;
        $owner->address=$request->address;
        $owner->state=$request->state;
        $owner->city_id=$request->city_id;
        $owner->zip=$request->zip;
        // $owner->email=$request->email;
        if(!empty($request->password)){
            $owner->password= Hash::make($request->password);
        }
        $owner->save();
        $success="Add Rental Owner Successfully";
        return  back()->with('success',$success);
       

        


    }

    public function destroy($id)
    {
        $owner = User::Find($id);
        $owner->delete();
        return Redirect::back()->with('success', 'Deleted Owner Successfully');
        
    }

 




}
