<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Group;
use App\Models\Group_status;
class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','zailcode','email', 'name','application_id'];



    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    
    public function meetings()
    {
        return $this->hasOne(Meeting::class);
    }
    public function group_complate(){
        $complate=1;
        $application=$this->application;
        $emails=[];
        if(!empty($application->group_member_email_1)){
            array_push($emails,$application->group_member_email_1);
        }
        if(!empty($application->group_member_email_2)){
            array_push($emails,$application->group_member_email_2);
        }

        if(!empty($application->group_member_email_3)){
            array_push($emails,$application->group_member_email_3);
        }
        if(!empty($application->group_member_email_4)){
            array_push($emails,$application->group_member_email_4);
        }
        
        foreach($emails as $email){
            $app=Group::where('email','=',$email)->where('code','=',$this->code)->where('leader','=',0)->first();
            if(!$app){
                $complate=0;
            }
        }
        if($complate){
            $groups=Group::where('code', $this->code)
            ->update([
                'complate' => $complate
             ]);
        }
        return $complate;

    }

    public function group_status()
    {
        return $this->belongsTo(Group_status::class);
    }
}
