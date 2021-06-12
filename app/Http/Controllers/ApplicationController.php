<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\City;
use App\Models\State;
use App\Models\House_type;
use App\Models\House;
use App\Models\Room_type;
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

        return view('application.step1', compact('application','genders','citys','states','house_types','house_groups','house_boardings','room_types'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:registers',
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
        return redirect('/register2');
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

        if (!isset($register->productImg)) {
            $request->validate([
                'productimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();
            $request->productimg->storeAs('productimg', $fileName);
            $register = $request->session()->get('register');
            $register->productImg = $fileName;
            $request->session()->put('register', $register);
        }
        return view('register.step4', compact('register'));
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        $register->productImg = null;

        return view('register.step3', compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        $register->save();

        return redirect('/data');
    }
}
