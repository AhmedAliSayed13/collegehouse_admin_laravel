<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
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
}
