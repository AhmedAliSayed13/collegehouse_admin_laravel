<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function send_mail(){
        $to_name = 'Ahmed Nour';
        $to_email = 'backend002@gmail.com';
        $data = array('name'=>"Sam Jose", "body" => "Test mail");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('FROM_EMAIL_ADDRESS','Artisans Web');
        });
    }
}
