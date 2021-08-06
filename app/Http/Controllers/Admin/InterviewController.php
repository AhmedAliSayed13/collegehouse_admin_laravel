<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InterviewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Meeting;
use App\Models\Meeting_case;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InterviewController extends Controller
{
    public function index(InterviewsDataTable $house)
    {
        return $house->render('admin.interviews.index', ['title' => 'admin title']);
    }

    public function create()
    {
        // $owners = User::where('role_id', '=', 2)->get();
        // $citys = City::all();
        // $house_types = House_type::all();
        // $payment_methods = Payment_method::all();
        // return view('admin.houses.create-house', compact('owners', 'citys', 'house_types', 'payment_methods'));
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $interview = Meeting::Find($id);
        $application = Application::find($interview->application_id);
        $meeting_cases = Meeting_case::all();
        return view('admin.interviews.edit-Interview', compact('interview', 'application', 'meeting_cases'));
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
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
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ]);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function destroy($id)
    {
        $interview = Meeting::Find($id);
        DB::table('meetings')->where('id', $id)->delete();
        return Redirect::back()->with('success', 'Deleted Interview Successfully');
    }

}
