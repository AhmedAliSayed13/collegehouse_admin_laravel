<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric','unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'integer'],
            'zip' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'condition' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'role_id' => $data['role_id'],
            'zip' => $data['zip'],
            'email' => $data['email'],
            'state' => $data['state'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
    * Show the application registration form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showRegistrationForm()
    {
     return redirect('tenant/register');;
    }
    public function showFormTenant()
    {
        $cities=City::all();
        return view('auth.register-tenant', compact('cities'));
    }

    public function showFormOwner()
    {
        $cities=City::all();
        return view('auth.register-owner', compact('cities'));
    }
    public function redirectTo()
    {
        if (auth()->user()->role_id==1) {
            return '/admin/dashboard';
        } else if (auth()->user()->role_id==2) {
            return '/admin/dashboard';
        } else {
            return '/tenant/dashboard';
        }
    }




}
