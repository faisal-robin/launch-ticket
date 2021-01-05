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
use App\Models\State;

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
            $get_states = State::orderby('id', 'desc')->select('id', 'name')->where('country_id',18)->limit(5)->get();
        } else {
            $get_states = State::orderby('id', 'desc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('country_id',18)->limit(15)->get();
        }

        $response = array();
        foreach ($get_states as $state) {
            $response[] = array("value" => $state->id, "label" => $state->name);
        }

        return response()->json($response);
    }

    public function search_schedules(Request $request) {        
        $request->validate([
            'departure_from' => 'required|max:255',
            'arrival_at' => 'required|max:255',
            'departure_date' => 'required|max:255'
        ]);       
        $data['all_slider'] = Slider::all();
        $date = str_replace('/', '-', $request->departure_date);
        if ($date < date('Y-m-d')) {
            $data['launch_schedules'] = [];
            session()->flash('schedule_departure_date', 'not_allow');
        } else {        
            $data['launch_schedules'] = LaunchSchedule::where(['from_state_id' => $request->departure_from,
                        'to_state_id' => $request->arrival_at,
                        'schedule_date' => date("Y-m-d", strtotime($date))])
                    ->get();
        }
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
        $html = '';
        $html .= '<option value="">Select Cabin</option>';
        foreach ($schedule_rooms as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->room_no . '</option>';
        }
        // echo '<pre>'; print_r($html);die;
        return response($html);
    }

    public function get_rooms_price(Request $request){
        $price = DB::table('rooms')
                ->where('id',$request->room_id)
                ->select('sell_price')
                ->first();
        return response($price->sell_price);
    }

}
