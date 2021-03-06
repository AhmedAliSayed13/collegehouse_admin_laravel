<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\City;
use App\Models\Group;
use App\Models\Application;
use App\Models\House;
use App\User;
use App\DataTables\ApplicationsDataTable;
use App\Models\tentantPayment;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Auth;
use Alert;
use App\Models\Lease_form;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendFillLeaseForm;
use App\Mail\sendOwnerConfirmLeaseForm;

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
        //$group=Group::where('code',$code)->where('user_id',auth()->user()->id)->first();
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
        $group=Group::where('leader',1)->where('code',$request->code)->first();
        $application= $group->application;
        $name=$application->first_name.' '.$application->last_name;
        if($group){
            $this->sendEmailFillLeaseForm($group->email,$group->code,$name);
        }
            
         return back();
    }

    public function sendEmailFillLeaseForm($email,$code,$name){
        $data['name'] = $name;
        $data['code'] =$code;
        Mail::to($email)->send(new SendFillLeaseForm($data));
    }

    public function fill_lease($code){
        $group=Group::where('code',$code)->where('leader',1)->first();
        $application=$group->application;
        $houses='';
        if($application->house_type_id==1){
            $requested_houses = explode(',', $application->requested_houses);
           $houses=House::whereIn('id',$requested_houses)->get();
        }else{
            $houses=House::where('house_type_id',$application->house_type_id)->get();
        }
        return view('tenant.fill_lease',compact('code','houses'));
         
    }

    public function store_fill_lease(Request $request){
        
        $validatedData = $request->validate([
            'price' => ['required'],
            'code' => ['required'],
            'house_id' => ['required'],
        ]);
        $group=Group::where('code',$request->code)->where('leader',1)->first();
       $lease_form=new Lease_form();
       $lease_form->code=$request->code;
       $lease_form->user_id=$group->user_id;
       $lease_form->price=$request->price;
       $lease_form->house_id=$request->house_id;
       $lease_form->save();
       $owner=$lease_form->house->owner;
        alert()->success('Save Information Successfully', 'Success');
        $this->sendOwnerConfirmLeaseForm($owner->email,$lease_form->code,$owner->fullname());
         return back();
    }

    public function sendOwnerConfirmLeaseForm($email,$code,$name){
        $data['name'] = $name;
        $data['code'] =$code;
        Mail::to($email)->send(new sendOwnerConfirmLeaseForm($data));
    }
}
