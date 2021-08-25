<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zoom;
use Carbon\Carbon;
use Mail;
use App\Models\Group;
use App\Mail\testmail;

class TestController extends Controller
{
    public function test(){
        $group=Group::find(1);
        return $group->group_complate();
    }
    

}
