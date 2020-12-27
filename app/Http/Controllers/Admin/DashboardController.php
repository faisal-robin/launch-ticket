<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function get_products(Request $request){

      $search = $request->search;

      if($search == ''){
         $products = Product::orderby('name','asc')->select('id','name')->limit(5)->get();
      }else{
         $products = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($products as $product){
         $response[] = array("value"=>$product->id,"label"=>$product->name);
      }

      return response()->json($response);
   }
    
}
