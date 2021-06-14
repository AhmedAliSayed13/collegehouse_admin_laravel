<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\City;
use App\Models\State;
use App\Models\House_type;
use App\Models\House;
use App\Models\Room_type;
use App\Models\Room;
use App\Models\Chapter;
use App\Models\Payment_method;
use App\Models\Paying_rent;
use App\Models\Application;
use App\Models\Reason_sign_parent;
use App\Models\Parent_information;
class ApplicationController extends Controller
{

    public function createStep1(Request $request)
    {
        $application=NULL;
        if (empty($request->session()->get('application'))) {
            $application = new Application();
            $request->session()->put('application', $application);
        } else {
            $application = $request->session()->get('application');
            $request->session()->put('application', $application);
        }

        
        $genders=Gender::all();
        $citys=City::all();
        $states=State::all();
        $house_types=House_type::all();
        $house_groups=House::where('house_type_id','=',1)->get();
        $house_boardings=House::where('house_type_id','=',2)->get();
        $room_types=Room_type::all();
        $rooms=Room::all();
        $chapters=Chapter::all();
        $payment_methods=Payment_method::all();
        $paying_rents=Paying_rent::all();
        return view('application.step1', compact('application','genders','citys','states','house_types','house_groups','house_boardings','room_types','rooms','chapters','payment_methods','paying_rents'));
    }

    public function PostcreateStep1(Request $request)
    {
        $arr2=[];
        $arr3=[];
        $arr1=array(
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender_id' => ['required','integer'],
            'email' => ['required', 'email'],
            'birthday' => ['required', 'date'],
            'phone' => ['required', 'string'],
            'ssn' => ['required', 'numeric'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'city_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'zip' => ['required', 'string'],
            'house_type_id' => ['required', 'integer'],
            'requested_houses' => ['required', 'string'],
            // 'group_lead_name' => ['required', 'string'],
            // 'group_member_name_1' => ['required','string'],
            // 'group_member_name_2' => ['required','string'],
            // 'group_member_name_3' => ['required','string'],
            // 'group_member_name_4' => ['required','string'],
            // 'room_id' => ['required','integer'],
            // 'room_type_id' => ['required','integer'],
            'amount_pay_dollars' => ['required','integer'],
            'bringing_Car' => ['required'],
            // 'car_make' => ['required', 'string'],
            // 'car_model' => ['required', 'string'],
            // 'driver_license_number' => ['required', 'string'],
            // 'car_license_number' => ['required', 'string'],
            'school' => ['required', 'string'],
            'major' => ['required', 'string'],
            'graduation_year' => ['required', 'string'],
            'gpa' => ['required','integer'],
            'chapter_id' => ['required','integer'],
            'payment_method_id' => ['required','integer'],
            'paying_rent_id' => ['required','integer'],
            'register_vote' => ['required']
        );
        if($request->house_type_id==1){
            $arr2=array(
                'group_lead_name' => ['required', 'string'],
                'group_member_name_1' => ['required','string'],
                'group_member_name_2' => ['required','string'],
                'group_member_name_3' => ['required','string'],
                'group_member_name_4' => ['required','string']
                
            );
        }elseif($request->house_type_id==2){
            $arr2=array(
                'room_id' => ['required','integer'],
                'room_type_id' => ['required','integer']
            );
        }


        if($request->bringing_Car==1){
            $arr3=array(
                'car_make' => ['required', 'string'],
                'car_model' => ['required', 'string'],
                'driver_license_number' => ['required', 'string'],
                'car_license_number' => ['required', 'string']
            );
        }
        $arr=$arr1+$arr2+$arr3;
        $validatedData = $request->validate($arr);

        

        if(empty($request->session()->get('application'))){
            $application = new Application();
            $application->fill($validatedData);
            $request->session()->put('application', $application);
        }else{
            $application = $request->session()->get('application');
            $application->fill($validatedData);
            $request->session()->put('application', $application);
        }
        return redirect()->route('step2');
    }

    public function createStep2(Request $request)
    {
        $application = $request->session()->get('application');

        $parent_information_1=NULL;
        if (empty($request->session()->get('parent_information_1'))) {
            $parent_information_1 = new Parent_information();
            $request->session()->put('parent_information_1', $parent_information_1);
        } else {
            $parent_information_1 = $request->session()->get('parent_information_1');
            $request->session()->put('parent_information_1', $parent_information_1);
        }

        $parent_information_2=NULL;
        if (empty($request->session()->get('parent_information_2'))) {
            $parent_information_2 = new Parent_information();
            $request->session()->put('parent_information_2', $parent_information_2);
        } else {
            $parent_information_2 = $request->session()->get('parent_information_2');
            $request->session()->put('parent_information_2', $parent_information_2);
        }
         

         $reason_sign_parents=Reason_sign_parent::all();
         $citys=City::all();
         $states=State::all();
         return view('application.step2', compact('application','reason_sign_parents','citys','states','parent_information_1','parent_information_2'));
    }

    public function PostcreateStep2(Request $request)
    {
        $arr2=[];
        $arr3=[];
        $arr1=array(
            'both_parents_signing'=>['required', 'integer'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'city_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'zip' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'place_employment' => ['required','string'],
            'Position' => ['required','string'],
            'first_name_2' => ['required', 'string'],
            'last_name_2' => ['required', 'string'],
            'address1_2' => ['required', 'string'],
            'address2_2' => ['required', 'string'],
            'city_id_2' => ['required', 'integer'],
            'state_id_2' => ['required', 'integer'],
            'email_2' => ['required', 'email'],
            'phone_2' => ['required', 'string'],
            'zip_2' => ['required', 'string'],
            'place_employment_2' => ['required','string'],
            'Position_2' => ['required','string']
        );
        if($request->both_parents_signing==1){
            $arr2=array(
                'reason_sign_parent_id' => ['required', 'integer'],
            );
        }

        if($request->reason_sign_parent_id==4){
            $arr2=array(
                'parents_sign_not_other_reasons' => ['required', 'string'],
            );
        }

        $arr=$arr1+$arr2+$arr3;
        $validatedData = $request->validate($arr);

        $application="";
        $parent_information_1="";
        $parent_information_2="";
        if(empty($request->session()->get('application'))){
            redirect()->route('step1');
        }else{
            $application = $request->session()->get('application');
            $application->both_parents_signing=$request->both_parents_signing;
            $application->reason_sign_parent_id=$request->reason_sign_parent_id;
            $application->parents_sign_not_other_reasons=$request->parents_sign_not_other_reasons;
            $request->session()->put('application', $application);
        }


        if(empty($request->session()->get('parent_information_2'))){
            $parent_information_1 = new Parent_information();
            $parent_information_2 = new Parent_information();
        }else{
            $parent_information_1 = $request->session()->get('parent_information_1');
            $parent_information_2 = $request->session()->get('parent_information_2');
        }
        $parent_information_1->first_name=$request->first_name;
        $parent_information_1->last_name=$request->last_name;
        $parent_information_1->address1=$request->address1;
        $parent_information_1->address2=$request->address2;
        $parent_information_1->city_id =$request->city_id ;
        $parent_information_1->state_id  =$request->state_id  ;
        $parent_information_1->zip =$request->zip ;
        $parent_information_1->phone =$request->phone ;
        $parent_information_1->email =$request->email ;
        $parent_information_1->Position =$request->Position ;
        $parent_information_1->place_employment =$request->place_employment ;


        $parent_information_2->first_name=$request->first_name_2;
        $parent_information_2->last_name=$request->last_name_2;
        $parent_information_2->address1=$request->address1_2;
        $parent_information_2->address2=$request->address2_2;
        $parent_information_2->city_id =$request->city_id_2 ;
        $parent_information_2->state_id =$request->city_id_2 ;
        $parent_information_2->zip =$request->zip_2 ;
        $parent_information_2->phone =$request->phone_2 ;
        $parent_information_2->email  =$request->email_2  ;
        $parent_information_2->Position =$request->Position_2 ;
        $parent_information_2->place_employment =$request->place_employment_2 ;

        $request->session()->put('parent_information_1', $parent_information_1);
        $request->session()->put('parent_information_2', $parent_information_2);
        $request->session()->put('application', $application);

        return redirect()->route('step3');
       
    }

    public function createStep3(Request $request)
    {
        $parent_information_1 = $request->session()->get('parent_information_1');
        $parent_information_2 = $request->session()->get('parent_information_2');
        $application = $request->session()->get('application');
        print_r($application);
    }

    public function PostcreateStep3(Request $request)
    {
        $register = $request->session()->get('register');

        if (!isset($register->applicationImg)) {
            $request->validate([
                'applicationimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "applicationImage-" . time() . '.' . request()->applicationimg->getClientOriginalExtension();
            $request->applicationimg->storeAs('applicationimg', $fileName);
            $register = $request->session()->get('register');
            $register->applicationImg = $fileName;
            $request->session()->put('register', $register);
        }
        return view('register.step4', compact('register'));
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        $register->applicationImg = null;

        return view('register.step3', compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        $register->save();

        return redirect('/data');
    }
}
