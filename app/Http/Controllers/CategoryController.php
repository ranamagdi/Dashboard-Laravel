<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Modal\Category;
use Dotenv\Result\Success;
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
    public function create() {
        $categories=Category::all();
        return view('categories.create',['categories'=>$categories]);
    }
    public function save(CategoryRequest $request) {
        // $validatedData = $request->validate([

        // ],[
        //     "title_ar.required"=>"مطلوب",
        //     "description_ar.required"=>"مطلوب"
        // ]);
       Category::Create([
            'id'=>$request->id,
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'parent_id'=>$request->parent_id,



        ]

        );
          return redirect()->route('home')->with('Success','created success');
    }
}
