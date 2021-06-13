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
class ApplicationController extends Controller
{

    public function createStep1(Request $request)
    {
        $application = $request->session()->get('application');
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
        $validatedData = $request->validate([
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
            'group_lead_name' => ['nullable', 'string'],
            'group_member_name_1' => ['nullable','string'],
            'group_member_name_2' => ['nullable','string'],
            'group_member_name_3' => ['nullable','string'],
            'group_member_name_4' => ['nullable','string'],
            'room_id' => ['nullable','integer'],
            'room_type_id' => ['nullable','integer'],
            'amount_pay_dollars' => ['required','integer'],
            'bringing_Car' => ['required'],
            'car_make' => ['nullable', 'string'],
            'car_model' => ['nullable', 'string'],
            'driver_license_number' => ['nullable', 'string'],
            'car_license_number' => ['nullable', 'string'],
            'school' => ['required', 'string'],
            'major' => ['required', 'string'],
            'graduation_year' => ['required', 'string'],
            'gpa' => ['required','integer'],
            'chapter_id' => ['required','integer'],
            'payment_method_id' => ['required','integer'],
            'paying_rent_id' => ['required','integer'],
            'register_vote' => ['required'],
        ]);

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
        $register = $request->session()->get('register');

        return view('register.step2', compact('register'));
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|unique:registers',
        ]);
        if (empty($request->session()->get('register'))) {
            $register = new \App\Register();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        } else {
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        return redirect('/register3');
    }

    public function createStep3(Request $request)
    {
        $register = $request->session()->get('register');
        return view('register.step3', compact('register'));
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
