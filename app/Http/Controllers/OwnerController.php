<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\User;
use App\Models\Meeting;
use App\Models\Lease_form;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
class OwnerController extends Controller
{
    public function showDashboard(){
        return view('owner.dashboard');
    }
    public function showProfile(){
        $cities=City::all();
        return view('owner.profile',compact('cities'));
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
        return view('owner.change-password');
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

    public function showmeeting(){
        $meetings=Meeting::all();
        return view('owner.meeting',compact('meetings',$meetings));
    }
    public function editmeeting($id){
        $meetings = Meeting::find($id);
        // $positions = Position::all();
        return view('owner.create_metting')->with('meetings',$meetings);
        
    }
    public function updatemeeting(Request $request,$id){
        $input = $request->all();
        $meetings = Meeting::findOrFail($id);
        $meetings->update([
            'meeting_date' => $request->meeting_date
        ]);
        //  Toastr::success('meeting updated successfully');
        return redirect()->route('owner.meeting');
        
    }
    public function deletemeeting($id){
        Meeting::find($id)->delete();
        return redirect()->back();
    }

    public function confirm_lease($code){
        $lease=Lease_form::where('code',$code)->first();
        return view('owner.confirm_lease',compact('lease'));
    }

    public function store_confirm_lease(Request $request){
        $lease=Lease_form::find($request->id);
        
        $pdf = PDF::loadView('lease',array('lease'=>$lease)); 
        $path = public_path('pdf_docs/'); 
        $fileName =  'lease_'.$lease->code.'.'. 'pdf' ; 
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('pdf_docs/'.$fileName);
        $lease->owner_confirm=$request->owner_confirm;
        $lease->lease_pdf=$fileName;
        $lease->save();
        alert()->success('Save Information Successfully','Success');
        return redirect()->back();
    }
}
