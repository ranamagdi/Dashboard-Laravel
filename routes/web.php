<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/cat', function () {
//     return view('category');
// });

Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){ //...
    Route::group(['middleware'=>'checkAdmin'],function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/cat', 'CategoryController@index')->name('cate');
        Route::get('/product', 'ProductsController@index')->name('product');
    });

});



