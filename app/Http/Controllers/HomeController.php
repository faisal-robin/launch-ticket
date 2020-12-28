<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use App\Models\Customer;
use App\Models\Terminal;

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

       if($search == ''){
           $get_terminal = Terminal::whereTerminalStatus('ACTIVE')->orderby('id','desc')->select('id','terminal_name')->limit(5)->get();
       }else{
           $get_terminal = Terminal::orderby('id','desc')->select('id','terminal_name')->where('terminal_status', 'like', '%' .$search . '%')->limit(15)->get();
       }

       $response = array();
       foreach($get_terminal as $terminal){
           $response[] = array("value"=>$terminal->id,"label"=>$terminal->terminal_name);
       }

       return response()->json($response);
    }

}
