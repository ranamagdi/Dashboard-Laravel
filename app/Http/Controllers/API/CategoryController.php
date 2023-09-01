<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Modal\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index(){
       $categories=CategoryResource::collection(Category::all());

       $data=[
        'msg'=>'return All data from DB',
        'status'=>200,
        'data'=>$categories

       ];
       return response()->json($data);
    }
    public function show($id){
        $categories=Category::find($id);
        if($categories){
            $data=[
                'msg'=>'return one data from DB',
                'status'=>200,
                'data'=>new CategoryResource($categories)

               ];
               return response()->json($data);

        }
        else{
            $data=[
                'msg'=>'No such id',
                'status'=>202,
                'data'=>null

               ];
               return response()->json($data);

        }


    }
    public function store(Request $request){
       $validateData=Validator::make($request->all(),[

        'id' => 'required|max:11',
        'title_en' => 'required|min:5|max:255',
        'title_ar' => 'required|min:5|max:255',
        'description_en' => 'required|min:10|max:255',
        'description_ar' => 'required|min:10|max:255',
        'parent_id' => 'required|max:255',
        'cat_img' => 'required|max:2048|image|mimes:png,jpg,jpeg,gif',

       ]);
       if($validateData->fails()){
        $data=[
            'msg'=>'No valid data',
            'status'=>203,
            'data'=>$validateData->errors()
           ];
           return response()->json($data);

       }


        $imageName="";
        if($request->hasFile('cat_img')){
            $image=$request->cat_img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('categories/image'),$imageName);
        }
       $final=Category::Create([
            'id'=>$request->id,
            'cat_img'=>$imageName,
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'parent_id'=>$request->parent_id,



        ] );
        $data=[
            'msg'=>'Create new Record success',
            'status'=>200,
            'data'=>new CategoryResource($final)
           ];
           return response()->json($data);


    }

    public function delete(Request $request){
        $id=$request->id;
        $categories=Category::find($id);
        if(File::exists(public_path('categories/image/'.$categories->cat_img))){
            File::delete(public_path('categories/image/'.$categories->cat_img));
            }
        $categories->delete();
        $data=[
            'msg'=>'Deleted successfllly',
            'status'=>205,
            'data'=>null
           ];
           return response()->json($data);

    }

    public function update(Request $request){
        $validateData=Validator::make($request->all(),[

            'id' => 'required|max:11',
            'title_en' => 'required|min:5|max:255',
            'title_ar' => 'required|min:5|max:255',
            'description_en' => 'required|min:10|max:255',
            'description_ar' => 'required|min:10|max:255',
            'parent_id' => 'required|max:255',
            'cat_img' => 'required|max:2048|image|mimes:png,jpg,jpeg,gif',

           ]);
           if($validateData->fails()){
            $data=[
                'msg'=>'No valid data',
                'status'=>203,
                'data'=>$validateData->errors()
               ];
               return response()->json($data);

           }
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
        $data=[
            'msg'=>'Updated successfllly',
            'status'=>207,
            'data'=>new CategoryResource($update)
           ];
           return response()->json($data);

    }

}
