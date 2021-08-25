<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Meeting;
use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use App\Models\Group;
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

            $groups=Group::where('code', $request->group_code)->update(['group_status_id' => $request->group_status_id]);
            $meeting = Meeting::where('group_code',$request->group_code)->first();

            if ($meeting) {
                

                if($request->meeting_date){
                    $meeting_id = $meeting->meeting_id;
                    $data = $this->update2($meeting_id, $request->all())['data'];
                    $meeting->meeting_date = $request->meeting_date;
                    $meeting->save();
                }
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
}
