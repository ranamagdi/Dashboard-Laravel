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
        $category=DB::table('categories')->select('id','title_en','description_en','parent_id','created_at')->get();
        $product=Products::all();
        return view('home',['category'=>$category,'product'=>$product]);
    }

}
