@extends('layouts.app')
@section('content')
@include('includes.navbar')
<div class="container">
<h2 class="text-center">Create New Category </h2>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form enctype="multipart/form-data" method="POST" action="{{route('categories.save')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">ID</label>
              <input type="number" class="form-control" name="id">
            </div>
            @error('id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
             <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Image</label>
              <input type="file" class="form-control" name="cat_img">
            </div>
            @error('cat_img')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title english</label>
                <input type="text" class="form-control" name="title_en">
              </div>
              @error('title_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title arabic</label>
                <input type="text" class="form-control" name="title_ar">
              </div>
              @error('title_ar')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description english</label>
                <input type="text" class="form-control" name="description_en">
              </div>
              @error('description_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description arabic</label>
                <input type="text" class="form-control" name="description_ar">
              </div>
              @error('description_ar')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Parent id</label>
                <select name="parent_id" class="form-control">
                  <option value="0">Main category</option>
                  @foreach ($categories as $items )
                  <option value="{{$items->id}}">{{$items->id}}-{{$items->title_en}}</option>
                  @endforeach

                </select>
              </div>

            <button type="submit" class="btn btn-primary w-100" name="submit-btn">Submit</button>
          </form>
    </div>
</div>
</div>
@endsection
