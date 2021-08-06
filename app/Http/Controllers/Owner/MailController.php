<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(){
        $to_name = 'Ahmed Nour';
        $to_email = 'backend002@gmail.com';
        $data = array('name'=>"Ahmed Nour", "body" => "Test mail");

        Mail::send('owner.mail_message', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('ahmedsallah005@gmail.com','Ahmed sallah');
        });
    }
}
