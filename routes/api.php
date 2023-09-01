<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alldata','API\CategoryController@index');
Route::get('show/{id}','API\CategoryController@show');
Route::post('create','API\CategoryController@store');
Route::post('delete','API\CategoryController@delete');
Route::post('update','API\CategoryController@update');
