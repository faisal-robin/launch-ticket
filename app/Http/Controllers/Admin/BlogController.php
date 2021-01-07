<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Blog;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['all_blog'] = Blog::all();
        return view("admin.blog.all_blog", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("admin.blog.add_blog");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'short_summary' => 'required',
            'full_summary' => 'required'
        ]);

//        print_r($request->file('image'));die;
        $blog = new Blog;

        $blog->title = $request->title;
        $blog->short_summary = $request->short_summary;
        $blog->status = $request->status;
        $blog->full_summary = $request->full_summary;
        $blog->date = $request->date;
        $path = $request->file('image')->store('blogs');
        $blog->image_source = $path;
        $blog->save();
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
        $data['blog_info'] = Blog::find($id);

//        echo '<pre>';print_r($data);die;
        return view("admin.blog.edit_blog", $data);
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
            'title' => 'required',
            'short_summary' => 'required',
            'full_summary' => 'required'
        ]);
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->short_summary = $request->short_summary;
        $blog->status = $request->status;
        $blog->full_summary = $request->full_summary;
        if ($request->file('image')) {
            $previous_images = DB::table('blogs')->where('id', $id)->get();
            if (File::exists('storage/app/blogs/' . $previous_images[0]->image_source)) {
                File::delete('storage/app/blogs/' . $previous_images[0]->image_source);
            }
            $upload_folder = 'blogs';
            $path = $request->file('image')->storeAs($upload_folder, $request->file('file')->getClientOriginalName());
            $blog->image_source = $path;
        }
        if ($request->date) {
            $blog->date = $request->date;
        }

        $blog->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('admin/blogs');
    }

}
