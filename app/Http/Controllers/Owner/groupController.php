<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Meeting;
use App\Models\Group_status;
use DB;
class groupController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $grpups_counts=Group::selectRaw('code,count(*) as total')
        ->groupBy('code')->get();
        foreach($grpups_counts as $grpups_count){
            if($grpups_count->total==5){
                
                DB::table('groups')->where('code', $grpups_count->code)->update(array('complate' => 1));
            }
        }

        $groups=Group::where('leader','=',1)->get();
        return view('owner.groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group=Group::find($id);
        $code=$group->code;
        $group_status_id=$group->group_status_id;
        $complate=$group->group_complate();
        $groups=Group::where('code','=',$code)->get();
        $group_statuss=Group_status::all();
        $meeting=Meeting::where('group_code',$code)->first();
        return view('owner.groups.view',compact('groups','meeting','code','complate','group_statuss','group_status_id')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
