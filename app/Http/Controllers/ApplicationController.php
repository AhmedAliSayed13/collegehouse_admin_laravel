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
use App\Models\Employment;
use App\Models\Group;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Str;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Environment\Console;

class ApplicationController extends Controller
{

    public function createStep1(Request $request)
    {
        $application=new Application();

        
        if (empty($request->session()->get('application'))) {
            $request->session()->put('application', $application);
        }else{
            $application = $request->session()->get('application');
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
        if(!empty($request->code)){
            $request->session()->put('code', $request->code);
        }

        if($request->session()->get('code')){
            $code=$request->session()->get('code');
            return view('application.step1', compact('application','genders','citys','states','house_types','house_groups','house_boardings','room_types','rooms','chapters','payment_methods','paying_rents','code'));
        }else{
            return view('application.step1', compact('application','genders','citys','states','house_types','house_groups','house_boardings','room_types','rooms','chapters','payment_methods','paying_rents'));
        }
         
       
        
    }

    public function PostcreateStep1(Request $request)
    {
         //return($request->all());
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
            'house_type_id' => ['nullable', 'integer'],
            'requested_houses' => ['nullable', 'string'],
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



        if(empty($request->session()->get('code'))){
            if($request->house_type_id==1){
                $arr2=array(
                    'group_lead_name' => ['required', 'string'],
                    'group_member_email_1' => ['required','email'],
                    'group_member_email_2' => ['required','email'],
                    'group_member_email_3' => ['required','email'],
                    'group_member_email_4' => ['required','email'],
                    
                );
            }elseif($request->house_type_id==2){
                $arr2=array(
                    'room_id' => ['required','integer'],
                    'room_type_id' => ['required','integer']
                );
            }
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
         //return $arr;
        $validatedData = $request->validate($arr);

        
        $application = new Application();
        if(empty($request->session()->get('application'))){
            
            
            $application->register_vote=$request->register_vote;
            $application->group_lead_name=$request->group_lead_name;
            $application->group_member_email_1=$request->group_member_email_1;
            $application->group_member_email_2=$request->group_member_email_2;
            $application->group_member_email_3=$request->group_member_email_3;
            $application->group_member_email_4=$request->group_member_email_4;
            $application->fill($validatedData);
            $request->session()->put('application', $application);
        }else{
            $application = $request->session()->get('application');
            $application->fill($validatedData);
            $application->register_vote=$request->register_vote;
            $application->group_lead_name=$request->group_lead_name;
            $application->group_member_email_1=$request->group_member_email_1;
            $application->group_member_email_2=$request->group_member_email_2;
            $application->group_member_email_3=$request->group_member_email_3;
            $application->group_member_email_4=$request->group_member_email_4;
            $request->session()->put('application', $application);
        }
        return redirect()->route('step2');
    }

    public function createStep2(Request $request)
    {
        $application = $request->session()->get('application');
        $parent_information_1 = null;
        if (!empty($request->session()->get('parent_information_1'))) {
            $parent_information_1 = $request->session()->get('parent_information_1');
        }else{
            $parent_information_1 = new Parent_information();
        }

        $parent_information_2 = null;
        if(!empty($request->session()->get('parent_information_2'))) {
            $parent_information_2 = $request->session()->get('parent_information_2');
        }else{
            $parent_information_2 = new Parent_information();
        }
         $reason_sign_parents=Reason_sign_parent::all();
         $citys=City::all();
         $states=State::all();
         return view('application.step2', compact('application','reason_sign_parents','citys','states','parent_information_1','parent_information_2'));
           // return $application = $request->session()->get('groups');
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
            'position' => ['required','string'],
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
            'position_2' => ['required','string']
        );
        if($request->both_parents_signing==1){
            $arr2=array(
                'reason_sign_parent_id' => ['required', 'integer'],
            );
        }

        if($request->both_parents_signing==1 && $request->reason_sign_parent_id==4){
            $arr2=array(
                'parents_sign_not_other_reasons' => ['required', 'string'],
            );
        }

        $arr=$arr1+$arr2+$arr3;
        $validatedData = $request->validate($arr);

        $application="";
        $parent_information_1 = new Parent_information();
        $parent_information_2 = new Parent_information();
        if(empty($request->session()->get('application'))){
            redirect()->route('step1');
        }else{
            $application = $request->session()->get('application');
            $application->both_parents_signing=$request->both_parents_signing;
            $application->reason_sign_parent_id=$request->reason_sign_parent_id;
            $application->parents_sign_not_other_reasons=$request->parents_sign_not_other_reasons;
            $request->session()->put('application', $application);
        }


        if(!empty($request->session()->get('parent_information_2'))){
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
            $parent_information_1->position =$request->position ;
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
            $parent_information_2->position =$request->position_2 ;
            $parent_information_2->place_employment =$request->place_employment_2;
            
            
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
               $request->session()->put('application', $application);
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
       
        $application = $request->session()->get('application');
        $employments=[];
        if (!empty($request->session()->get('employments'))){
            $employments = $request->session()->get('employments');
        }
        $citys=City::all();
        $states=State::all();
        return view('application.step4', compact('application','employments','citys','states'));
    }
    public function PostcreateStep4(Request $request){
        $arr2=[];
      
        $arr1=array(
            'have_employment_history'=>['required','boolean'],
        );

        if($request->have_employment_history==1){
            $arr2=array(
                'employer_name.*'=>['required','string'],
                'address1.*'=>['required','string'],
                'address2.*'=>['required','string'],
                'phone.*'=>['required','string'],
                'email.*'=>['required','string'],
                'city_id.*'=>['required','string'],
                'state_id.*'=>['required','string'],
                'zip.*'=>['required','string'],
                'position.*'=>['required','string'],
                'monthly_gross_salary.*'=>['required','string'],
                'current_work'=>['nullable','boolean'],
                'employment_date_start.*'=>['required','date'],
                'employment_date_end.*'=>['nullable','date'],
                'first_name.*'=>['required','string'],
                'last_name.*'=>['required','string'],
                'supervisor_title.*'=>['required','string']
            );
        }
        
        $arr=$arr1+$arr2;
        $validatedData = $request->validate($arr);
        
        $application=$request->session()->get('application');
               $application->have_employment_history=$request->have_employment_history;
               $request->session()->put('application', $application);
        if($request->have_employment_history==0){
                $employments =[];
                $request->session()->put('employments', $employments);
                
        }else{
            $employments =[];
            
            for($i=0;count($request->employer_name)>$i;$i++){
                $employment=new Employment();
                $employment->employer_name=$request->employer_name[$i];
                $employment->address1=$request->address1[$i];
                $employment->address2=$request->address2[$i];
                $employment->phone=$request->phone[$i];
                $employment->email=$request->email[$i];
                $employment->city_id=$request->city_id[$i];
                $employment->state_id=$request->state_id[$i];
                $employment->zip=$request->zip[$i];
                $employment->position=$request->position[$i];
                $employment->monthly_gross_salary=$request->monthly_gross_salary[$i];
                $employment->employment_date_start=$request->employment_date_start[$i];
                $employment->employment_date_end=$request->employment_date_end[$i];
                
                if($request->current_work==1 && $i==0){ 
                        $employment->current_work=$request->current_work;       
                }
                $employment->supervisor_first_name=$request->supervisor_first_name[$i];
                $employment->supervisor_last_name=$request->supervisor_last_name[$i];
                $employment->supervisor_title=$request->supervisor_title[$i];
                
                
                
                $employments[$i]=$employment;

            }
            $request->session()->put('employments', $employments);
        }

        return redirect()->route('step5');
    }

    public function createStep5(Request $request){
        $application = $request->session()->get('application');
        return view('application.step5',compact('application'));
    }

    public function PostcreateStep5(Request $request){
        $validatedData = $request->validate([
            'applicant_full_name'=>['required','string'],
            'terms_and_conditions'=>['required'],
        ]);
        $application = $request->session()->get('application');
        $application->applicant_full_name=$request->applicant_full_name;
        $application->terms_and_conditions=$request->terms_and_conditions;
        $request->session()->put('application', $application);

        return redirect()->route('step6');

    }


    public function createStep6(Request $request){
        $application = $request->session()->get('application');
        $parent_information_1 = $request->session()->get('parent_information_1');
        $parent_information_2 = $request->session()->get('parent_information_2');
        $rental_histories = $request->session()->get('rental_histories');
        $employments = $request->session()->get('employments');
        $code = $request->session()->get('code');
      
        $houses=House::whereIn('id', explode(',' ,$application->requested_houses))->get();

        return view('application.step6',compact('application','parent_information_1','parent_information_2','rental_histories','employments','houses','code'));
    }

    public function PostcreateStep6(Request $request){
        
        $parent_information=$request->session()->get('parent_information_1');
        $parent_information_1= Parent_information::create([
            'first_name' => $parent_information->first_name,
            'last_name' => $parent_information->last_name,
            'address1' => $parent_information->address1,
            'address2' => $parent_information->address2,
            'city_id' => $parent_information->city_id,
            'state_id' => $parent_information->state_id,
            'zip' => $parent_information->zip,
            'phone' => $parent_information->phone,
            'email' => $parent_information->email,
            'position' => $parent_information->position,
            'place_employment' => $parent_information->place_employment,
        ]);
        

         $parent_information = $request->session()->get('parent_information_2');
         $parent_information_2= Parent_information::create([
            'first_name' => $parent_information->first_name,
            'last_name' => $parent_information->last_name,
            'address1' => $parent_information->address1,
            'address2' => $parent_information->address2,
            'city_id' => $parent_information->city_id,
            'state_id' => $parent_information->state_id,
            'zip' => $parent_information->zip,
            'phone' => $parent_information->phone,
            'email' => $parent_information->email,
            'position' => $parent_information->position,
            'place_employment' => $parent_information->place_employment,
        ]);
        




       
 
        

       
        
        $app = $request->session()->get('application');
        $application= new Application();
        $application->parent_information1_id= $parent_information_1->id;
        $application->parent_information2_id= $parent_information_1->id;
        $application->first_name= $app->first_name;
        $application->last_name= $app->last_name;
        $application->gender_id= $app->gender_id;
        $application->email= $app->email;
        $application->birthday= $app->birthday;
        $application->phone= $app->phone;
        $application->ssn= $app->ssn;
        $application->address1= $app->address1;
        $application->address2= $app->address2;
        $application->city_id= $app->city_id;
        $application->state_id= $app->state_id;
        $application->zip= $app->zip;
        $application->school= $app->school;
        $application->major= $app->major;
        $application->graduation_year= $app->graduation_year;
        $application->gpa= $app->gpa;
        $application->amount_pay_dollars= $app->amount_pay_dollars;
        $application->both_parents_signing= $app->both_parents_signing;
        $application->chapter_id= $app->chapter_id;
        $application->have_rental_history= $app->have_rental_history;
        $application->applicant_full_name= $app->applicant_full_name;
        $application->terms_and_conditions= $app->terms_and_conditions;
        $application->have_employment_history= $app->have_employment_history;
        $application->payment_method_id= $app->payment_method_id;
        $application->paying_rent_id= $app->paying_rent_id;
        $application->bringing_Car= $app->bringing_Car;
        $application->requested_houses= $app->requested_houses;
        $application->bringing_Car= $app->bringing_Car;
        $application->register_vote= $app->register_vote;
        $application->house_type_id= $app->house_type_id;
        $application->group_lead_name= $app->group_lead_name;
        $application->group_member_email_1= $app->group_member_email_1;
        $application->group_member_email_2= $app->group_member_email_2;
        $application->group_member_email_3= $app->group_member_email_3;
        $application->group_member_email_4= $app->group_member_email_4;
        $application->room_id= $app->room_id;
        $application->room_type_id= $app->room_type_id;
        $application->car_make= $app->car_make;
        $application->car_model= $app->car_model;
        $application->driver_license_number= $app->driver_license_number;
        $application->car_license_number= $app->car_license_number;
        $application->user_id=auth()->user()->id;
        $application->save();

        
        $rental_histories = $request->session()->get('rental_histories');
        foreach($rental_histories as $rental_historie){
            $rental=new Rental_history();
            $rental->application_id=$application->id;
            $rental->address1=$rental_historie->address1;
            $rental->address2=$rental_historie->address2;
            $rental->city_id=$rental_historie->city_id;
            $rental->state_id=$rental_historie->state_id;
            $rental->zip=$rental_historie->zip;
            $rental->rental_date=$rental_historie->rental_date;
            $rental->monthly_rent=$rental_historie->monthly_rent;
            $rental->reason_leaving=$rental_historie->reason_leaving;
            $rental->first_name=$rental_historie->first_name;
            $rental->last_name=$rental_historie->last_name;
            $rental->phone=$rental_historie->phone;
            $rental->email=$rental_historie->email;
            $rental->save();


            
        }

        $employments = $request->session()->get('employments');
        foreach($employments as $employment){
            $emp=new Employment();
            $emp->application_id=$application->id;
            $emp->employer_name=$employment->employer_name;
            $emp->phone=$employment->phone;
            $emp->email=$employment->email;
            $emp->address1=$employment->address1;
            $emp->address2=$employment->address2;
            $emp->city_id=$employment->city_id;
            $emp->zip=$employment->zip;
            $emp->state_id=$employment->state_id;
            $emp->position=$employment->position;
            $emp->monthly_gross_salary=$employment->monthly_gross_salary;
            $emp->current_work=$employment->current_work;
            $emp->employment_date_start=$employment->employment_date_start;
            $emp->employment_date_end=$employment->employment_date_end;
            $emp->supervisor_first_name=$employment->supervisor_first_name;
            $emp->supervisor_last_name=$employment->supervisor_last_name;
            $emp->supervisor_title=$employment->supervisor_title;
            $emp->save();
        }
        

        $group=new Group();
        $group->email=$application->email;
        $group->application_id=$application->id;
        $group->user_id=Auth::user()->id;
        if(empty($request->session()->get('code')) && !empty($application->requested_houses)){
            $group->leader=1;
            $group->code=Str::random(40).''.$application->id;
        }else{
            $group->leader=0;
            $group->code=$request->session()->get('code');
        }
        $group->save();
        
        
        
        if($request->session()->get('code')){
            $emails=array();
            if($application->group_member_email_1){
                array_push($emails,$application->group_member_email_1);
            }
            if($application->group_member_email_2){
                array_push($emails,$application->group_member_email_2);
            }
            if($application->group_member_email_3){
                array_push($emails,$application->group_member_email_3);
            }
            if($application->group_member_email_4){
                array_push($emails,$application->group_member_email_4);
            }


            foreach($emails as $email){
                $data['type']=1;
                $data['code']=$request->session()->get('code');
                $data['name']=$application->first_name.' '.$application->last_name;
                Mail::to($email)->send(new SendMail($data));
            }

                
            
        }


        $data=array();
        $data['type']=2;
        $data['tenant']=$parent_information_1->first_name.' '.$parent_information_1->last_name;
        $data['name']=$application->first_name.' '.$application->last_name;
        Mail::to($parent_information_1->email)->send(new SendMail($data));

        $data=array();
        $data['type']=2;
        $data['tenant']=$parent_information_2->first_name.' '.$parent_information_2->last_name;
        $data['name']=$application->first_name.' '.$application->last_name;
        Mail::to($parent_information_2->email)->send(new SendMail($data));
        
        $request->session()->flush();
        return redirect()->route('step1');
    }
    
    public function remove(Request $request){
        $item='';
        $request->session()->flush();
        return 'done';
    }
    public function popupLogin(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->messages()->get('*'));  
        }else{
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return ['success' => true, 'data' => 1];
            }else{
                return response()->json(0);
            }
        }

        // return response()->json(1);
    }
   
}
