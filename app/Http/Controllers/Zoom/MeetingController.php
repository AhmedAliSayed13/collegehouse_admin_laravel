<?php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use  App\Models\Meeting;
class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    function list(Request $request) {
        try {
            $path = 'users/me/meetings';
            $response = $this->zoomRequest('GET', $path);

            $data = json_decode((string) $response->getBody(), true);
            $data['meetings'] = array_map(function (&$m) {
                $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
                return $m;
            }, $data['meetings']);

            return [
                'success' => $response->getStatusCode() === 200,
                'data' => $data,
            ];
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return [
                'success' => false,
                'data' => $e,
            ];
        }
    }
    public function create(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'application_id' => 'required',
                'meeting_date' => 'nullable|date',
                'application_case_id' => 'required',
            ]);

            $application = Application::find($request->application_id);
            $application->application_case_id = $request->application_case_id;
            $application->save();

            if ($request->meeting_date) {
                if ($validator->fails()) {
                    return [
                        'success' => false,
                        'data' => $validator->errors(),
                    ];
                }
                $data = $validator->validated();

                $path = 'users/me/meetings';
                $response = $this->zoomRequest('POST', $path, [], [
                    'topic' => 'meeting for request house',
                    'type' => self::MEETING_TYPE_SCHEDULE,
                    'start_time' => $this->toZoomTimeFormat($data['meeting_date']),
                    'duration' => 30,
                    'agenda' => 'agenda',
                    'settings' => [
                        'host_video' => false,
                        'participant_video' => false,
                        'waiting_room' => true,
                    ],
                ]);
                $data = json_decode((string) $response->getBody(), true);
                $url = $data['join_url'];
                $start_time = $data['start_time'];
                $id = $data['id'];
                if($application->meeting){
                    $meeting=$application->meeting;
                    $meeting->meeting_url=$url;
                    $meeting->meeting_date=$start_time;
                    $meeting->meeting_id = $id;
                    $meeting->save();
                }else{
                    $meeting=new Meeting();
                    $meeting->meeting_url=$url;
                    $meeting->meeting_date=$start_time;
                    $meeting->meeting_id = $id;
                    $meeting->application_id=$application->id;
                    $meeting->save();
                    $application->meeting_id=$meeting->id;
                    $application->save();
                }
                
            }

            // return [
            //     'success' => $response->getStatusCode() === 201,
            //     'data' => json_decode((string) $response->getBody(), true),
            // ];
            
            return back();

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return [
                'success' => false,
                'data' => $e->getMessage(),
            ];
        }
    }
    public function get(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
          
            'meeting_date' => 'nullable|date',
            'meeting_case_id' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => 'meeting for request house',
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['meeting_date']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => 'agenda',
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'waiting_room' => true,
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);
                $url = $data['join_url'];
                $start_time = $data['start_time'];
                $id = $data['id'];
        $meeting=Meeting::find($request->id);
        $meeting->meeting_url=$url;
        $meeting->meeting_date=$start_time;
        $meeting->meeting_id = $id;
        $meeting->application_case_id =$request->application_case_id;
        $meeting->save;
        return back();
    }

    public function delete(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }
}
