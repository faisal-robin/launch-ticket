<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal;
use Illuminate\Support\Facades\DB;

class TerminalController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['terminal_list'] = Terminal::all();
        $data['state_list'] = DB::table('states')
                ->whereCountryId(18)
                ->get();
        return view('admin.terminal.index',$data);
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
            'terminal_name' => 'required',
            'city_name' => 'required'
        ]);

        $terminal = new Terminal;

        $terminal->terminal_name = $request->terminal_name;
        $terminal->state_id = $request->city_name;

        $terminal->save();
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
         $data['state_list'] = DB::table('states')
                ->whereCountryId(18)
                ->get();
        $data['terminal_info'] = Terminal::find($id);
        //echo "<pre>";print_r($data['subject_list']);die();
        return view('admin.terminal.edit_terminal', $data);
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
        $terminal = Terminal::find($id);

        $request->validate([
            'terminal_name' => 'required',
            'city_name' => 'required'
        ]);

        $terminal->terminal_name = $request->terminal_name;
         $terminal->state_id = $request->city_name;
    
        //echo "<pre>";print_r($terminal);die();
        $terminal->save();

        //return redirect('admin/teacher/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminal = Terminal::find($id);
        $terminal->delete();
        return redirect('admin/terminals');
    }
}
