<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zoom;
use Carbon\Carbon;

class TestController extends Controller
{
    public function test(){
        // $meeting = Zoom::meeting()->make([
        //     'topic' => 'New meeting',
        //     'type' => 8,
        //     'start_time' => new Carbon('2020-08-12 10:00:00'), 
        //   ]);
        //  $data=Zoom::user()->find('id')->meetings()->save($meeting);
        // $data=Zoom::user()->meetings()->all();
        // print_r($data);


        // $users = Zoom::user()->where('status', 'active')->paginate(100)->get();

        $user = Zoom::user()->where('status', 'active')->first();
        print($user);
    }
    public function test2(Request $request)
    {

       return $request;

  

        

    }
}
