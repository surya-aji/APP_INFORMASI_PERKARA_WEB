<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

Route::get('/login','Authentication\LoginController@showFormLogin');
Route::post('/logged','Authentication\LoginController@login');





Route::group(['prefix'=>'admin','middleware'=>'CheckLogged'],function(){
    Route::get('/','Admin\DashboardController@index');
});
