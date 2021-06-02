<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        $url='/';
        if(Auth::check()){
            if(Auth::user()->role_id==1){
                $url='admin/dashboard';
            }else if(Auth::user()->role_id==2){
                $url='owner/dashboard';
            }else if(Auth::user()->role_id==3){
                $url='tenant/dashboard';
            }
        }
        return view('welcome',compact('url'));
    }
}
