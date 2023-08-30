@extends('layouts.app')

@section('content')
@include('includes.navbar')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-header">Categories <span class="badge badge-dark">{{$category->count()}}</span></div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                          @if ($category->count()>0)
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col"> {{__('langauge.TITLE')}}</th>
                            <th scope="col"> {{__('langauge.DESCRIPTION')}}</th>
                            <th scope="col">Parent id</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Operation</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $item )
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <th scope="row">{{$item->title}}</th>
                                <th scope="row">{{$item->description}}</th>
                                <th scope="row">{{$item->parent_id}}</th>
                                <th scope="row">{{$item->created_at}}</th>
                                <th scope="row" class="d-flex ">
                                    <a href="{{route('categories.show',$item->id)}}" class="btn btn-success  mx-2 p-2"><i class="fa-solid fa-eye"></i></a>
                                    <a  href="{{route('categories.delete',$item->id)}}"  class="btn btn-danger   mx-2 p-2"><i class="fa-solid fa-trash"></i></a>
                                </th>

                              </tr>

                            @endforeach

                            @else
                             <div class="alert alert-danger">No data ..</div>
                            @endif


                        </tbody>
                      </table>

                </div>
              </div>

        </div>

        <div class="col-md-6">
            <div class="card" >
                <div class="card-header">Products <span class="badge badge-dark">{{$product->count()}}</span></div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                         @if ($product->count()>0)
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col"> {{__('langauge.TITLE')}}</th>
                            <th scope="col"> {{__('langauge.DESCRIPTION')}}</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Operation</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $item )
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <th scope="row">{{$item->title}}</th>
                                <th scope="row">{{$item->description}}</th>
                                <th scope="row">{{$item->price}}</th>
                                <th scope="row">{{$item->quantity}}</th>
                                <th scope="row">{{$item->created_at}}</th>
                                <th scope="row" class="d-flex">
                                    <a class="btn btn-success  mx-2 p-2"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-danger   mx-2 p-2"><i class="fa-solid fa-trash"></i></a>
                                </th>
                              </tr>

                            @endforeach

                            @else
                             <div class="alert alert-danger">No data ..</div>
                            @endif


                        </tbody>
                      </table>

                </div>
              </div>

        </div>

    </div>
</div>
@endsection
