<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Modal\Category;
use Dotenv\Result\Success;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        if(File::exists(public_path('categories/image/'.$categories->cat_img))){
            File::delete(public_path('categories/image/'.$categories->cat_img));
            }else{
            dd('File does not exists.');
            }
        $categories->delete();
        return redirect()->route('home');

    }
    public function create() {
        $categories=Category::all();
        return view('categories.create',['categories'=>$categories]);
    }
    public function edit($id) {
        $allCategories=Category::all();
        $categories=Category::findOrFail($id);
        return view('categories.edit',['categories'=>$categories],['allCategories'=>$allCategories]);
    }
    public function update(CategoryRequest $request) {
        $categories_id=$request->old_id;
        $update=Category::findOrFail($categories_id);
        $imageName="";
        if($request->hasFile('cat_img')){
            $image=$request->cat_img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('categories/image'),$imageName);
        }
      $update->update([
            'id'=>$request->id,
            'cat_img'=>$imageName,
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'parent_id'=>$request->parent_id,



        ]

        );
          return redirect()->route('home')->with('Success','updated success');
    }
    public function save(CategoryRequest $request) {
        // $validatedData = $request->validate([

        // ],[
        //     "title_ar.required"=>"مطلوب",
        //     "description_ar.required"=>"مطلوب"
        // ]);
        $imageName="";
        if($request->hasFile('cat_img')){
            $image=$request->cat_img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('categories/image'),$imageName);
        }
       Category::Create([
            'id'=>$request->id,
            'cat_img'=>$imageName,
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
