<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\City;
use App\Models\Group;
use App\Models\Application;
use App\User;
use App\DataTables\ApplicationsDataTable;
use App\Models\tentantPayment;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Auth;
use Alert;


class TenantController extends Controller
{
    public function showDashboard(){
        return view('tenant.dashboard');
    }
    public function showProfile(){
        $cities=City::all();
        return view('tenant.profile',compact('cities'));
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
        return view('tenant.change-password');
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
    public function showzailcode($code){
      return view('tenant.create_zailcode',compact('code'));
    }
    public function addzailcode(Request $request){
        $validatedData = $request->validate([
            'zailcode' => ['required'],
            'code' => ['required'],
        ]);
        $groups = Group::where('code','=',$request->code)->get();

            foreach($groups as $group){
                $group->zailcode=$request->zailcode;
                $group->save();
            }

            Toastr::success('Zailcode added successfully');
         return redirect()->route('tenant.dashboard');
    }

    // public function showapplications(ApplicationsDataTable $house){

    //     $applications=Application::all();
    //     $cities=City::all();
    //     return view('tenant.applications',compact('applications','cities'));
    // }

    public function list_group(){
        $user_id=auth()->user()->id;
        $groups=Group::where('user_id','=',$user_id)->get();
        return view('tenant.list-group',compact('groups'));
    }

    public function add_rental_deposit($code){
        $group=Group::where('code',$code)->where('user_id',auth()->user()->id)->first();
        // if($group){
        //     return view('tenant.add-rental-deposit',compact('code'));   
        // }
        return view('tenant.add-rental-deposit',compact('code'));
         
    }

    public function store_rental_deposit(Request $request){
        
        $validatedData = $request->validate([
            'zailcode' => ['required'],
            'code' => ['required'],
        ]);
        $groups = Group::where('code',$request->code)
        ->update(['zailcode' => $request->zailcode]);
        alert()->success('Save Information Successfully', 'Success');
            
         return back();
    }
}
