<?php

namespace App\Http\Controllers;

use App\Modal\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    public function index()  {
        return view('category');

    }
    public function show($category_id) {
        $categories=Category::findOrFail($category_id);
        return view('categories.show',['categories'=>$categories]);

    }
    public function delete($category_id) {
        $categories=Category::findOrFail($category_id);
        $categories->delete();
        return redirect()->route('home');

    }
}
