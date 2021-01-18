<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

class BookingController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['all_booking'] = Booking::all();

        // echo "<pre>";print_r($data['booking']);die();
        return view('admin.booking.all_booking', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $data['booking_info'] = DB::table('bookings')
                        ->where('bookings.id', $id)
                        ->leftJoin('customers','customers.id','=','bookings.customer_id')
                        ->leftJoin('booking_details','booking_details.booking_id','=','bookings.id')
                        ->leftJoin('launch_schedules','launch_schedules.id','=','booking_details.launch_schedule_id')
                        ->leftJoin('rooms','rooms.id','=','booking_details.launch_room_id')
                        ->select('bookings.*','bookings.id as b_id','launch_schedules.*','launch_schedules.id as s_id','rooms.room_no','booking_details.booking_room_price','customers.customer_email','customers.customer_phone','customers.customer_address')
                        ->get();
        // echo "<pre>";print_r($data['booking_info']);die();
        return view('admin.booking.view_booking', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       
    }

}
