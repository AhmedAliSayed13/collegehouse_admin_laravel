<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMeetingDate;
use App\Mail\AcceptLeader;
use App\Models\Application;
use App\Models\Group;
use App\Models\Meeting;
use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class ZoommeetingController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function show($id)
    {
        $meeting = $this->get($id);

        return 'done';
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'group_code' => 'required',
                'meeting_date' => 'nullable|date',
                'group_status_id' => 'required',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'data' => $validator->errors(),
                ];
            }
            $groups = Group::where('code', $request->group_code)->update(['group_status_id' => $request->group_status_id]);
            if($request->group_status_id==4){
                $this->sendAcceptedToLeader($request->group_code);
            }
            $meeting = Meeting::where('group_code', $request->group_code)->first();

            if ($request->meeting_date) {

                if ($meeting) {

                    $meeting_id = $meeting->meeting_id;
                    $data = $this->update2($meeting_id, $request->all())['data'];
                    $meeting->meeting_date = $request->meeting_date;
                    $meeting->save();

                } else {

                    $data = $this->create($request->all())['data'];
                    $url = $data['join_url'];
                    $start_time = $data['start_time'];
                    $id = $data['id'];
                    $meeting = new Meeting();
                    $meeting->meeting_url = $url;
                    $meeting->meeting_date = $start_time;
                    $meeting->meeting_id = $id;
                    $meeting->group_code = $request->group_code;

                    $meeting->save();

                }
                $groups = Group::where('code', $request->group_code)->get();
                $meeting = Meeting::where('group_code', $request->group_code)->first();
                foreach ($groups as $group) {
                    $data = array();
                    $data['name'] = $group->application->first_name . ' ' . $group->application->last_name;
                    $data['date'] = $meeting->meeting_date;
                    $data['url'] = $meeting->meeting_url;
                    Mail::to($group->email)->send(new SendMeetingDate($data));
                }
            }

            return back();
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return [
                'success' => false,
                'data' => $e->getMessage(),
            ];
        }
    }

    public function update(Request $request)
    {
        try {
            $meeting_id = $request->meeting_id;
            $meeting = Meeting::find($request->id);
            if ($request->meeting_date) {
                $this->update2($meeting_id, $request->all());
                $meeting->meeting_date = $request->meeting_date;
            }
            $meeting->meeting_case_id = $request->meeting_case_id;
            $meeting->save();
            return back();
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return [
                'success' => false,
                'data' => $e->getMessage(),
            ];
        }
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return 'done';
    }

    public function sendAcceptedToLeader($code){
        $leader=Group::where('code', $code)->where('leader','=',1)->first();
        $data['name'] = $leader->application->first_name . ' ' . $leader->application->last_name;
        $data['code'] =$leader->code;
        Mail::to($leader->email)->send(new AcceptLeader($data));
    }
}
