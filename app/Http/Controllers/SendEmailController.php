<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Mail\AcceptLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    function index()
    {
        return view('contactform');
    }
    function send(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'message'   =>   $request->message
        );

        Mail::to($request->email)->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }

    public function acceptedLeader(Request $request){
        $data = array(
            'email'      =>  $request->email,
            'message'   =>   "http://127.0.0.1:8000/tenant/addPayment"
        );

        Mail::to($request->email)->send(new AcceptLeader($data));
        return back()->with('success', 'Thanks for contacting us!');

    }
}
