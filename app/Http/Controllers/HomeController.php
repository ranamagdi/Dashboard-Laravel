<?php

namespace App\Http\Controllers;

use App\Modal\Category;
use App\Modal\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $category=DB::table('categories')->select('id','title_'.app()->getLocale()." as title",'description_'.app()->getLocale()." as description",'parent_id','created_at')->get();
        $product=DB::table('products')->select('id','title_'.app()->getLocale()." as title",'description_'.app()->getLocale()." as description",'price','quantity','created_at')->get();
        return view('home',['category'=>$category,'product'=>$product]);
    }

}
