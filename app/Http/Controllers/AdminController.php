<?php

namespace App\Http\Controllers;


use App\City;
use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }
    public function showProfile(){
        $cities=City::all();
        return view('admin.profile',compact('cities'));
    }
    public function profileSave(Request $request){
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric','unique:users,phone,'.Auth::user()->id.',id'],
            'address' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'integer'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.Auth::user()->id.',id']
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city_id = $request->city_id;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->email = $request->email;
        $user->save();
        $success="Save Information Successfully";
        return  back()->with('success',$success);
    }
    public function showChangePassword(){
        return view('admin.change-password');
    }
    public function ChangePasswordSave(Request $request){
        $validatedData = $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'password_confirmation' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $success="Change Password Successfully";
        return  back()->with('success',$success);
    }
    public function ShowAddOwner(Request $request){
        $cities=City::all();
        return view('admin.add-owner',compact('cities'));
    }
    public function ShowAddOwnerSave(Request $request){
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

    public function ShowListOwner()
    {
        $perpage=1;
        $owners=User::where('role_id','=', 2)->paginate($perpage);
        
        return view('admin.list-owner',compact('owners','perpage'));
    }
    public function ShowAddHouse(){
        $owners=User::where('role_id','=', 2)->get();
        $citys=City::all();
        return view('admin.add-house',compact('owners','citys'));
    }
    public function ShowAddHouseSave(Request $request){
        $validatedData = $request->validate([
            'owner_id' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'city_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'type_house_id' => ['required', 'integer'],
            'num_rooms' => ['required', 'integer'],
            'num_residents' => ['required', 'integer'],
            'num_bathrooms' => ['required', 'integer' ],
            'num_flooers' => ['required', 'integer'],
            'num_parkings' => ['required', 'integer'],
            'total_size' => ['required', 'numeric'],
            'num_kitchens' => ['required', 'integer'],
            'annual_reset' => ['required','integer'],
            'payment_method_id' => ['required', 'integer'],
            'image_ownership' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'image_lease' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

     
        

    }
}
