<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use App\Models\Customer;
use App\Models\Terminal;
use App\Models\LaunchSchedule;
use App\Models\Launch;
use App\Models\Room;
use App\Models\Category;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data['all_slider'] = Slider::all();
        $data['all_terminal'] = Terminal::whereTerminalStatus('ACTIVE')->get();
//        echo '<pre>'; 
//        print_r($data['all_terminal']);die;
        return view('frontend/home_content', $data);
    }

    public function get_terminal(Request $request) {
        $search = $request->search;

        if ($search == '') {
            $get_terminal = Terminal::whereTerminalStatus('ACTIVE')->orderby('id', 'desc')->select('id', 'terminal_name')->limit(5)->get();
        } else {
            $get_terminal = Terminal::orderby('id', 'desc')->select('id', 'terminal_name')->where('terminal_name', 'like', '%' . $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($get_terminal as $terminal) {
            $response[] = array("value" => $terminal->id, "label" => $terminal->terminal_name);
        }

        return response()->json($response);
    }

    public function search_schedules(Request $request) {
        $date = str_replace('/', '-', $request->departure_date);
        $data['launch_schedules'] = LaunchSchedule::where(['terminal_from' => $request->search_departure_id,
                    'terminal_to' => $request->search_arrival_id,
                    'schedule_date' => date("Y-m-d", strtotime($date))])
                ->get();
        $data['all_slider'] = Slider::all();
//        echo '<pre>'; 
//        print_r($data['launch_schedules']);die;
        return view('frontend/schedule/schedule', $data);
    }

    public function get_cabin($schedule_id) {
        $data['all_category'] = Category::all();
        $data['schedule_id'] = $schedule_id;
//                echo '<pre>'; 
//        print_r($data['all_category']);die;
        return view('frontend/cabin/launch_cabin', $data);
    }

    public function get_rooms_by_schdule(Request $request) {
        $schedule_rooms = DB::table('launch_schedule_item')
                ->join('rooms', 'launch_schedule_item.room_id', '=', 'rooms.id')
                ->where(['launch_schedule_item.schedule_id' => $request->schedule_id, 'rooms.main_category' => $request->category_id])
                ->get();
        $output = '';
        $output .= '<option value="">Select Cabin</option>';
        foreach ($schedule_rooms as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->room_no . '</option>';
//            array_push($output, '<option value="' . $row->id . '">' . $row->room_no . '</option>');
        }
//        echo '<pre>'; print_r($output);die;
        return response($output);
    }

}
