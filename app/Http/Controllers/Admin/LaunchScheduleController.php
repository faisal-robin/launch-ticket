<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\LaunchSchedule;
use App\Models\Launch;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Auth;
use DB;

class LaunchScheduleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['launch_schedule_list'] = LaunchSchedule::with('launch')->get();
        // echo "<pre>";print_r($data['launch_schedule_list']);die();
        return view('admin.launch_schedule.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['launch_list'] = Launch::all();
        $data['terminal_list'] = Terminal::all();
        // echo "<pre>";print_r($data['launch_list']);die();
        return view('admin.launch_schedule.add_launch_schedule', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'launch' => 'required',
            'terminal_from' => 'required',
            'terminal_to' => 'required',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
        ]);

        $launch_schedule = new LaunchSchedule;

        $launch_schedule->launch_id = $request->launch;
        $launch_schedule->launch_name = $request->launch_name;
        $launch_schedule->terminal_from = $request->terminal_from;
        $terminal_from_state_id = Terminal::find($request->terminal_from);
        $launch_schedule->from_state_id = $terminal_from_state_id->state_id;
        $launch_schedule->terminal_to = $request->terminal_to;
        $terminal_to_state_id = Terminal::find($request->terminal_to);
        $launch_schedule->to_state_id = $terminal_to_state_id->state_id;
        $launch_schedule->schedule_date = $request->schedule_date;
        $launch_schedule->schedule_time = $request->schedule_time;
        $launch_schedule->created_by = Auth::user()->id;
        $launch_schedule->save();

        if ($launch_schedule->id) {
            $data_room = array();
            foreach ($request->room_id as $value) {
                $data_room['room_id'] = $value;
                $data_room['schedule_id'] = $launch_schedule->id;
                DB::table('launch_schedule_item')->insert($data_room);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['launch_schedule_info'] = LaunchSchedule::find($id);
        $data['launch_schedule_item'] = DB::table('launch_schedule_item')->select('rooms.id', 'rooms.room_no')->leftJoin('rooms', 'launch_schedule_item.room_id', '=', 'rooms.id')->where('schedule_id', $id)->get();

        // echo "<pre>";print_r($data['launch_schedule_item']);die();

        $data['launch_list'] = Launch::all();
        $data['terminal_list'] = Terminal::all();
        return view('admin.launch_schedule.edit_launch_schedule', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $launch_schedule = LaunchSchedule::find($id);

        // echo "<pre>";print_r($request->launch);die();

        $request->validate([
            'launch' => 'required',
            'terminal_from' => 'required',
            'terminal_to' => 'required',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
        ]);


        $launch_schedule->launch_id = $request->launch;
        $launch_schedule->launch_name = $request->launch_name;
        $launch_schedule->terminal_from = $request->terminal_from;
        $terminal_from_state_id = Terminal::find($request->terminal_from);
        $launch_schedule->from_state_id = $terminal_from_state_id->state_id;
        $launch_schedule->terminal_to = $request->terminal_to;
        $terminal_to_state_id = Terminal::find($request->terminal_to);
        $launch_schedule->to_state_id = $terminal_to_state_id->state_id;
        $launch_schedule->schedule_date = $request->schedule_date;
        $launch_schedule->schedule_time = $request->schedule_time;
        $launch_schedule->created_by = Auth::user()->id;

        $launch_schedule->save();

        DB::table('launch_schedule_item')->where('schedule_id', $id)->delete();

        if ($launch_schedule->id) {
            $data_room = array();
            foreach ($request->room_id as $value) {
                $data_room['room_id'] = $value;
                $data_room['schedule_id'] = $launch_schedule->id;
                DB::table('launch_schedule_item')->insert($data_room);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $launch_schedule = LaunchSchedule::find($id);
        $launch_schedule->delete();
        DB::table('launch_schedule_item')->where('schedule_id', $id)->delete();
        return redirect('admin/launch-schedules');
    }

}
