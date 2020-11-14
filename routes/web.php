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
    return redirect('home');
});

Auth::routes();

Route::post('activate','UserController@activateUser');
Route::get('success','UserController@successSubscription');
Route::post('cancel','UserController@cancelSubscription');
// Route::get('activate','UserController@activateUser');

Route::get('checkout','UserController@checkoutUser');
Route::get('report','UserController@monthlyReport');

Route::get('/home', 'HomeController@index')->name('home');
