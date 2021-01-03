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
//        echo  date("Y-m-d", strtotime($date));
        $data['launch_schedules'] = LaunchSchedule::where(['terminal_from' => $request->search_departure_id,
                    'terminal_to' => $request->search_arrival_id,
                    'schedule_date' => date("Y-m-d", strtotime($date))])
                ->get();
        $data['all_slider'] = Slider::all();
//        echo '<pre>'; 
//        print_r($data['launch_schedules']);die;
        return view('frontend/schedule/schedule', $data);
    }
    
    public function get_cabin($launch_id) {
         $data['all_slider'] = Slider::all();
        $data['all_cabin'] = Room::where('launch_id',$launch_id)->get();
//                echo '<pre>'; 
//        print_r($data['all_cabin']);die;
         return view('frontend/cabin/launch_cabin', $data);
    }

}
