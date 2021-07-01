<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('auth.pihak.login');
});

Route::resource('/login-user','Authentication\LoginController');
Route::resource('/logged-user','Authentication\LoginController');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/login-admin', function(){
    return view('auth.admin.login');
})->name('login-admin');





// Route::group(['prefix'=>'logged','middleware'=>'CheckLogged'],function(){

    Route::group(['prefix' => '/user','middleware'=>'revalidate'],function () {
        Route::get('/{id}','User\DashboardController@index')->name('cekLogin');
        Route::get('{id}/perkara','User\PerkaraController@index');
        Route::get('{id}/dataumum','User\DataUmumController@index');
        Route::get('{id}/penetapan','User\PenetapanController@index');
        Route::get('{id}/jadwal','User\SidangController@index');
        Route::get('{id}/putusan','User\PutusanController@index');
        Route::get('{id}/biaya','User\BiayaController@index');
        Route::post('{id}/jadwal/ambil_antrian','User\SidangController@store')->name('ambil-antrian');

    });
   
   
// });
