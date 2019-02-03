<?php

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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/Admin/logo','Admin\LogoController',['as'=>'admin']);
Route::resource('/Admin/team','Admin\TeamController',['as'=>'admin']);
Route::resource('/Admin/slider','Admin\SliderController',['as'=>'admin']);
Route::resource('/Admin/client','Admin\ClientController',['as'=>'admin']);