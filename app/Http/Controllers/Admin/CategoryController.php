<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Faker\Provider\Image;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller {

    public function index() {
        $all_category = Category::all();
        $new_array = array();
        foreach ($all_category as $row) {
            $row['parent_cat'] = '';
            if ($row->parent_id) {
                $parent_cat = Category::where('id', $row->parent_id)->first();
                $row['parent_cat'] = $parent_cat->category_name;
            }

            $new_array[] = $row;
        }
        $data['all_category'] = $new_array;
//        $category = array(
//            'admin/categories' => array(),
//            'parent_cats' => array()
//        );
//        
//        
//        foreach ($data['all_category'] as $row) {
//            $category['admin/categories'][$row->id] = $row;
//            $category['parent_cats'][$row->parent_id][] = $row->id;
//        }
//        
//        echo $this->buildCategory('', $category);
//        echo '<pre>';print_r($new_array);
        return view('admin.category.all_category', $data);
    }

    public function create() {
        $all_category = Category::all();
        $new_array = array();
        foreach ($all_category as $row) {
            $row['parent_cat'] = '';
            if ($row->parent_id) {
                $parent_cat = Category::where('id', $row->parent_id)->first();
                $row['parent_cat'] = $parent_cat->category_name;
            }

            $new_array[] = $row;
        }
        $data['all_category'] = $new_array;
        return view('admin.category.add_category', $data);
    }

    public function store(Request $request) {
        $category = new Category;

        $request->validate([
            'category_name' => 'required|max:255',
            'category_cover_image' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'category_menu_image' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        $response['status'] = 'Error';

        $category->category_name = $request->category_name;
        $category->home_page_status = $request->home_page_status;
        $category->slug = $request->category_slug;
        $category->parent_id = $request->parent_id;
//         $category->sell_price = $request->sell_price;
//        $category->purchase_price = $request->purchase_price;

        $cover_photo = $request->file('category_cover_image')->store('category/category_cover');
        $menu_photo = $request->file('category_menu_image')->store('category/category_menu');

        $category->category_cover_image = $cover_photo;
        $category->category_menu_image = $menu_photo;

//     Start   Category Thumbnail
        $file = $request->file('category_cover_image')->hashName();
        $resize = Image::make($request->file('category_cover_image'))->resize(600, 400, function ($constraint) {
                    
                })->encode('jpg');

        // Put image to storage
        Storage::put("category/category_thumbnail/{$file}", $resize->__toString());
//     End   Category Thumbnail

        $category->category_thumbnail = 'category/category_thumbnail/' . $file;
        $category->category_description = $request->category_description;
        $category->meta_title = $request->category_meta_title;
        $category->meta_description = $request->category_meta_description;
        $category->meta_keywords = $request->category_meta_keywords;
        $category->save();

        if (isset($category->id)) {
            $response['status'] = 'Success';
        }

        echo json_encode($response);
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['category_data'] = Category::find($id);
        $all_category = Category::all();
        $new_array = array();
        foreach ($all_category as $row) {
            $row['parent_cat'] = '';
            if ($row->parent_id) {
                $parent_cat = Category::where('id', $row->parent_id)->first();
                $row['parent_cat'] = $parent_cat->category_name;
            }

            $new_array[] = $row;
        }
        $data['all_category'] = $new_array;

        return view("admin.category.edit_category", $data);
    }

    public function update(Request $request, $id) {
        $category = Category::find($id);
        $request->validate([
            'category_name' => 'required|max:255'
//            'category_cover_image' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
//            'category_menu_image' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        $category->category_name = $request->category_name;
        $category->slug = $request->category_slug;
        $category->parent_id = $request->parent_id;
//        $category->sell_price = $request->sell_price;
//        $category->purchase_price = $request->purchase_price;

        if ($request->hasFile('category_cover_image')) {
            if (File::exists('storage/app/category/' . $category->category_cover_image)) {
                File::delete('storage/app/category/' . $category->category_cover_image);
                File::delete('storage/app/category/' . $category->category_thumbnail);
            }
            $cover_photo = $request->file('category_cover_image')->store('category_cover');
            $category->category_cover_image = $cover_photo;

            $file = $request->file('category_cover_image')->hashName();
            $resize = Image::make($request->file('category_cover_image'))->resize(600, 400, function ($constraint) {
                        
                    })->encode('jpg');

            Storage::put("category/category_thumbnail/{$file}", $resize->__toString());
            $category->category_thumbnail = 'category/category_thumbnail/' . $file;
        }
        
        if ($request->hasFile('category_menu_image')) {
            if (File::exists('storage/app/category/' . $category->category_menu_image)) {
                File::delete('storage/app/category/' . $category->category_menu_image);
            }
            $menu_photo = $request->file('category_menu_image')->store('category_menu');
            $category->category_menu_image = $menu_photo;
        }
        $category->home_page_status = $request->home_page_status;
        $category->category_description = $request->category_description;
        $category->meta_title = $request->category_meta_title;
        $category->meta_description = $request->category_meta_description;
        $category->meta_keywords = $request->category_meta_keywords;

        $category->save();

        echo json_encode("Done");
    }

    public function destroy($id) {
        $category = Category::find($id);
        $child_category = Category::where('parent_id', $id)->get();
        if (!$child_category->isEmpty()) {
            Category::where('parent_id', $id)->delete();
        }

        $category->delete();

        return redirect('admin/categories');
    }

}
