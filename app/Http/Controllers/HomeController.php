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
use App\Models\Blog;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    public function index() {
        $data['all_slider'] = Slider::all();
        $data['all_terminal'] = Terminal::whereTerminalStatus('ACTIVE')
                ->get();
        $data['all_blog'] = Blog::whereStatus('ACTIVE')
                ->limit(6)
                ->get();
        $data['all_category'] = Category::all();
//        echo '<pre>'; 
//        print_r($data['all_terminal']);die;
        return view('frontend/home_content', $data);
    }

    public function get_terminal(Request $request) {
        $search = $request->search;

        if ($search == '') {
            $get_states = State::orderby('id', 'desc')
                    ->select('id', 'name')
                    ->where('country_id', 18)
                    ->limit(5)
                    ->get();
        } else {
            $get_states = State::orderby('id', 'desc')
                    ->select('id', 'name')
                    ->where('name', 'like', '%' . $search . '%')
                    ->where('country_id', 18)
                    ->limit(15)
                    ->get();
        }

        $response = array();
        foreach ($get_states as $state) {
            $response[] = array("value" => $state->id, "label" => $state->name);
        }

        return response()->json($response);
    }

    public function search_schedules(Request $request) {
        $request->validate([
            'departure_from' => 'required',
            'arrival_at' => 'required',
            'departure_date' => 'required'
        ]);

        $data['all_slider'] = Slider::all();
        $date = str_replace('/', '-', $request->departure_date);
        $data['launch_schedules'] = [];

        if ($date < date('Y-m-d')) {
            session()->flash('schedule_departure_date', 'not_allow');
        } else {
            $data['launch_schedules'] = LaunchSchedule::where([
                        'from_state_id' => $request->departure_from,
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

        $data['boarding_point'] = DB::table('launch_schedules')
                ->select('terminals.*')
                ->where('launch_schedules.id', $schedule_id)
                ->join('terminals', 'launch_schedules.terminal_to', '=', 'terminals.id')
                ->get();
//                echo '<pre>'; 
//        print_r($data['boarding_point']);die;
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

    public function get_rooms_price(Request $request) {
        $price = DB::table('rooms')
                ->where('id', $request->room_id)
                ->select('sell_price')
                ->first();
        return response($price->sell_price);
    }

    public function category_wise_rooms(Request $request) {
        $data['ctg_info'] = Category::whereSlug($request->category)
                ->get();
        $data['category_rooms'] = Room::whereMainCategory($data['ctg_info'][0]->id)
                ->limit(10)
                ->get();
        $data['related_category_rooms'] = DB::table('categories')->whereParentId(null)
                ->leftJoin('rooms', 'categories.id', '=', 'rooms.main_category')
                ->select('rooms.room_no', 'rooms.sell_price as room_sell_price', 'rooms.id as room_id', 'categories.*')
                ->limit(6)
                ->groupBy('categories.id')
                ->get();
//        echo '<pre>'; //        
//         print_r($data['related_category_rooms']);  
//        die; 
        return view('frontend/category_room/category_wise_rooms', $data);
    }

    public function blog_details(Request $request) {
        $data['blog_data'] = Blog::find($request->id);
        return view('frontend/blog/blog_details', $data);
    }
    
    public function all_blogs() {
     $data['all_blog'] = Blog::whereStatus('ACTIVE')
             ->limit(50)
                ->get();  
      return view('frontend/blog/all_blogs', $data);
    }

    public function checkout(Request $request) {
//        echo $request->category.'room'.$request->room.'boarding-point'.$request->boarding_point;die;
        $data['room_details'] = Room::find($request->room);
        $data['boarding_terminal'] = Terminal::find($request->boarding_point);
        $data['schedule_details'] = LaunchSchedule::where('launch_schedules.id', $request->schedule)
                ->join('terminals', 'launch_schedules.terminal_from', '=', 'terminals.id')
                ->get();
//        echo '<pre>'; print_r($data['schedule_details']);die;
        return view('frontend/checkout/checkout', $data);
    }

    public function add_customer(Request $request) {
        $validationArray['customer_first_name'] = 'required';
        $validationArray['customer_last_name'] = 'required';
        $validationArray['customer_email'] = 'required|unique:customers|email';
        $validationArray['customer_phone'] = 'required|unique:customers';
        $this->validate($request, $validationArray);
        $data['customer_first_name'] = $request->input('customer_first_name');
        $data['customer_last_name'] = $request->input('customer_last_name');
        $data['customer_postal_code'] = "";
        $data['customer_code'] = "";
        $data['password'] = "";
        $data['customer_email'] = $request->input('customer_email');
        $data['customer_phone'] = $request->input('customer_phone');
        $data['customer_address'] = $request->input('customer_address');
        $data['customer_status'] = 1;
        Customer::insert($data);
    }

}
