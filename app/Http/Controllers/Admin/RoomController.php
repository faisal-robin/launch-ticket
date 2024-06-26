<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Launch;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\File;

class RoomController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['room_list'] = Room::whereRoomStatus('ACTIVE')->get();
        $data['launch_list'] = Launch::whereLaunchStatus('ACTIVE')->get();
        $data['all_category'] = Category::all();
//
//        $category = array(
//            'categories' => array(),
//            'parent_cats' => array()
//        );
//
//        foreach ($all_category as $row) {
//            $category['categories'][$row->id] = $row;
//            $category['parent_cats'][$row->parent_id][] = $row->id;
//        }
//
//        $category_list = "<ul class=''><li class='form-control-label text-right main-category'>Main category</li>" . $this->buildCategory('', $category) . "</ul>";
//
//        $data['category_list'] = $category_list;
//        echo '<pre>';print_r($data['room_list']);die;
        return view('admin.room.index', $data);
    }

//    public function buildCategory($parent, $category, $database_cat = '') {
//        $html = "";
//        if (isset($category['parent_cats'][$parent])) {
//            $html .= "<ul class=''>";
////            $html .= "<li class='form-control-label text-right main-category'>Main category</li>";
//            foreach ($category['parent_cats'][$parent] as $cat_id) {
////                echo '<pre>';print_r($category['categories'][$cat_id]['id']);
//                if (!isset($category['parent_cats'][$cat_id])) {
//                    $html .= "<li> "
//                            . " <label>" .
//                            '<input type="checkbox" name="category[]" value="' . $category['categories'][$cat_id]['id'] . '"> ' . $category['categories'][$cat_id]->category_name .
//                            '<input type="radio" class="default-category" name="main_category" value="' . $category['categories'][$cat_id]['id'] . '"> ' . '' .
//                            "</label>"
//                            . "</li>";
//                }
//                if (isset($category['parent_cats'][$cat_id])) {
//                    $html .= "<li> <label>" .
//                            '<input type="checkbox" name="category[]" value="' . $category['categories'][$cat_id]['id'] . '"> ' . $category['categories'][$cat_id]->category_name .
//                            '<input type="radio" class="default-category" name="main_category" value="' . $category['categories'][$cat_id]['id'] . '"> ' . '' .
//                            "</label>";
//                    $html .= $this->buildCategory($cat_id, $category);
//                    $html .= "</li>";
//                }
//            }
//            $html .= "</ul>";
//        }
//        return $html;
//    }

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
    public function room_image_upload(Request $request) {
        //        echo '<pre>';print_r($request->file('file'));die;
        $upload_folder = 'rooms';
        $path = $request->file('file')->storeAs($upload_folder, $request->file('file')->getClientOriginalName());
        return $path;
    }

    public function store(Request $request) {

        $request->validate([
            'room_no' => 'required',
            'launch_id' => 'required',
            'sell_price' => 'required'
        ]);

        $room = new Room;

        $room->launch_id = $request->launch_id;
        $room->room_no = $request->room_no;
        $room->main_category = $request->category_id;
        $room->room_description = $request->room_description;
        $room->sell_price = $request->sell_price;
        $room->purchase_price = $request->purchase_price;

        $room->save();

        $data_category = array();
        if ($request->category) {
            foreach ($request->category as $value) {
                $data_category['room_id'] = $room->id;
                $data_category['category_id'] = $value;
                DB::table('room_categories')->insert($data_category);
            }
        }

        $data_image = array();
        $i = 0;
        if ($request->images_name) {
            foreach ($request->images_name as $row) {
                $data_image['room_id'] = $room->id;
                $data_image['image_source'] = $row;
                if ($i == 0) {
                    $data_image['is_main_image'] = 1;
                }else{                   
                $data_image['is_main_image'] = 0; 
                }
                DB::table('room_images')->insert($data_image);
                $i++;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['room_info'] = Room::find($id);
        $data['launch_list'] = Launch::whereLaunchStatus('ACTIVE')->get();
        $data['all_category'] = Category::all();

//        $category = array(
//            'categories' => array(),
//            'parent_cats' => array()
//        );
//
//        foreach ($all_category as $row) {
//            $category['categories'][$row->id] = $row;
//            $category['parent_cats'][$row->parent_id][] = $row->id;
//        }
//
////        echo '<pre>';print_r($data['all_attribute_with_group']);die;
//        $category_list = "<ul class=''><li class='form-control-label text-right main-category'>Main category</li>" . $this->buildCategory('', $category) . "</ul>";
//
//        $data['category_list'] = $category_list;
        return view('admin.room.edit_room', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'room_no' => 'required',
            'launch_id' => 'required',
            'sell_price' => 'required'
        ]);

        $room = Room::find($id);

        $room->launch_id = $request->launch_id;
        $room->room_no = $request->room_no;
        $room->room_description = $request->room_description;
        $room->sell_price = $request->sell_price;
        $room->purchase_price = $request->purchase_price;

        $room->save();

        if ($request->category) {

            $room->main_category = $request->category_id;
            DB::table('room_categories')->where('room_id', $id)->delete();
            $data_category = array();
            foreach ($request->category as $value) {
                $data_category['room_id'] = $room->id;
                $data_category['category_id'] = $value;
                DB::table('room_categories')->insert($data_category);
            }
        }

        $data_image = array();
        $i = 0;
        if ($request->images_name) {
            $previous_images = DB::table('room_images')->where('room_id', $room->id)->get();
            foreach ($previous_images as $rowImage) {
                if (File::exists('storage/app/rooms/' . $rowImage->image_source)) {
                    File::delete('storage/app/rooms/' . $rowImage->image_source);
                }
            }
            DB::table('room_images')->where('room_id', $room->id)->delete();
            foreach ($request->images_name as $row) {
                $data_image['room_id'] = $room->id;
                $data_image['image_source'] = $row;
                if ($i == 0) {
                    $data_image['is_main_image'] = 1;
                }else{                    
                $data_image['is_main_image'] = 0;
                }
                DB::table('room_images')->insert($data_image);
                $i++;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Room::find($id)->delete();
        return redirect('admin/rooms');
    }

    public function get_rooms(Request $request) {
        $search = $request->search;
        $id = $request->id;

        if ($search == '') {
            $get_room = Room::orderby('room_no', 'asc')->select('id', 'room_no')->where('launch_id', $id)->limit(5)->get();
        } else {
            $get_room = Room::orderby('room_no', 'asc')->select('id', 'room_no')->where('room_no', 'like', '%' . $search . '%')->where('launch_id', $id)->limit(15)->get();
        }

        $response = array();
        foreach ($get_room as $room) {
            $response[] = array("value" => $room->id, "label" => $room->room_no);
        }

        return response()->json($response);
    }

}
