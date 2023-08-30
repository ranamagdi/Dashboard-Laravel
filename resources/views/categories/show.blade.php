@extends('layouts.app')

@section('content')
@include('includes.navbar')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-striped table-dark">
                <thead>
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

                    <tr>
                        <th scope="row">{{$categories->id}}</th>
                        <th scope="row">{{$categories->title}}</th>
                        <th scope="row">{{$categories->description}}</th>
                        <th scope="row">{{$categories->parent_id}}</th>
                        <th scope="row">{{$categories->created_at}}</th>
                        <th scope="row">
                            <a href="{{route('home')}}" class="btn btn-primary mx-2 p-2"><i class="fa-solid fa-house"></i></a>

                        </th>

                      </tr>



                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
