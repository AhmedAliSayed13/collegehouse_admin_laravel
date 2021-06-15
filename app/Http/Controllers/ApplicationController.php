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
use App\Models\Rental_history;
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
        //print_r($request->all());
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
            'amount_pay_dollars' => ['required','integer'],
            'bringing_Car' => ['required'],
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
            $application->register_vote=$request->register_vote;
            $request->session()->put('application', $application);
        }else{
            $application = $request->session()->get('application');
            $application->fill($validatedData);
            $application->register_vote=$request->register_vote;
            $request->session()->put('application', $application);
        }
         return redirect()->route('step2');
        //print_r($application);
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
        if(empty($request->session()->get('parent_information_2'))) {
            $parent_information_2 = new Parent_information();
            $request->session()->put('parent_information_2', $parent_information_2);
        }else {
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
        $rental_histories=[];
        if (!empty($request->session()->get('rental_histories'))){
            $rental_histories = $request->session()->get('rental_histories');
        }
        $citys=City::all();
        $states=State::all();
        return view('application.step3', compact('application','rental_histories','citys','states'));
    }

    public function PostcreateStep3(Request $request){
        $arr2=[];
      
        $arr1=array(
            'have_rental_history'=>['required','boolean'],
        );

        if($request->have_rental_history==1){
            $arr2=array(
                'address1.*'=>['required','string'],
                'address2.*'=>['required','string'],
                'city_id.*'=>['required','string'],
                'state_id.*'=>['required','string'],
                'zip.*'=>['required','string'],
                'rental_date.*'=>['required','string'],
                'monthly_rent.*'=>['required','string'],
                'first_name.*'=>['required','string'],
                'last_name.*'=>['required','string'],
                'phone.*'=>['required','string'],
                'email.*'=>['required','string'],

            );
        }
        
        $arr=$arr1+$arr2;
        $validatedData = $request->validate($arr);
        
        $application=$request->session()->get('application');
               $application->have_rental_history=$request->have_rental_history;
        if($request->have_rental_history==0){
                $rental_histories =[];
                $request->session()->put('rental_histories', $rental_histories);
                
        }else{
            $rental_histories =[];
            
            for($i=0;count($request->address1)>$i;$i++){
                $rental_history=new Rental_history();
                $rental_history->address1=$request->address1[$i];
                $rental_history->address2=$request->address2[$i];
                $rental_history->city_id=$request->city_id[$i];
                $rental_history->state_id=$request->state_id[$i];
                $rental_history->zip=$request->zip[$i];
                $rental_history->rental_date=$request->rental_date[$i];
                $rental_history->monthly_rent=$request->monthly_rent[$i];
                $rental_history->reason_leaving=$request->reason_leaving[$i];
                $rental_history->first_name=$request->first_name[$i];
                $rental_history->last_name=$request->last_name[$i];
                $rental_history->phone=$request->phone[$i];
                $rental_history->email=$request->email[$i];
                
                $rental_histories[$i]=$rental_history;

            }
            $request->session()->put('rental_histories', $rental_histories);
        }

        
       
        return redirect()->route('step4');
    }


    public function createStep4(Request $request){
        $parent_information_1 = $request->session()->get('parent_information_1');
        $parent_information_2 = $request->session()->get('parent_information_2');
        $application = $request->session()->get('application');
        $rental_histories=[];
        if (!empty($request->session()->get('rental_histories'))){
            $rental_histories = $request->session()->get('rental_histories');
        }
        $citys=City::all();
        $states=State::all();
        return view('application.step4', compact('application','rental_histories','citys','states'));
    }
    
    public function remove(Request $request){
        $item='';
        $request->session()->forget('rental_histories');
        return 'done';
    }
   
}
