<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
//use Faker\Provider\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Launch;
use Illuminate\Http\Request;

class LaunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['launch_list'] = Launch::all();
        return view('admin.launch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'launch_name' => 'required',
            'launch_price_range' => 'required',
        ]);

        $launch = new launch;

        $launch->launch_name = $request->launch_name;
        $launch->launch_price_range = $request->launch_price_range;
        $launch->launch_description = $request->launch_description;

        $file = $request->file('launch_image')->hashName();
        $resize = Image::make($request->file('launch_image'))->resize(600, 200, function ($constraint) {})->encode('jpg');
        Storage::put("launch/{$file}", $resize->__toString());
        $launch->launch_image = 'launch/' . $file;

        $launch->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      
        $data['launch_info'] = Launch::find($id);
        //echo "<pre>";print_r($data['subject_list']);die();
        return view('admin.launch.edit_launch', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $launch = Launch::find($id);

        $request->validate([
            'launch_name' => 'required',
            'launch_price_range' => 'required',
        ]);

        $launch->launch_name = $request->launch_name;
        $launch->launch_price_range = $request->launch_price_range;
        $launch->launch_description = $request->launch_description;
        
        if ($request->hasFile('launch_image')) {
            if (File::exists('storage/app/' . $launch->launch_image)) {
                File::delete('storage/app/' . $launch->launch_image);
            }
            $photo = $request->file('launch_image')->store('launch');
            $launch->launch_image = $photo;
        }

        $launch->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $launch = Launch::find($id);
        $launch->delete();
        return redirect('admin/launchs');
    }
}
