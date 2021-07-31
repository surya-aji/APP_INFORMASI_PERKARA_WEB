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

Route::get('/login-user','User\LoginPihakController@index');
Route::get('/logout-pihak','User\LoginPihakController@logout');
Route::post('/logged-user','User\LoginPihakController@store')->name('loged');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
// Route::get('/login-admin', function(){
//     return view('auth.admin.login');
// })->name('login-admin');



Route::get('/admin-dashboard', 'Admin\DashboardController@index')->middleware('auth');

Route::get('/kelola-berkas', function () {
    return view('admin.kelola-berkas.index');
})->middleware('auth');

// Manajemen User

    Route::get('/manajemen-user','Admin\ManajemenUserController@index')->middleware('auth');
    Route::get('/register','Admin\ManajemenUserController@showRegister' )->middleware('auth');
    Route::post('/register','Admin\ManajemenUserController@create' )->name('tambah-user')->middleware('auth');
    Route::get('/manajemen-user/{id}','Admin\ManajemenUserController@edit')->middleware('auth');
    Route::post('/manajemen-user/{id}','Admin\ManajemenUserController@update')->middleware('auth');
    Route::post('/manajemen-user/destroy/{id}','Admin\ManajemenUserController@destroy')->middleware('auth');

// Kelola Berkas
Route::get('/kelola-berkas','Admin\DokumenController@index')->middleware('auth');
Route::get('/kelola-berkas/{id}','Admin\DokumenController@create')->middleware('auth');
Route::post('/kelola-berkas/{id}/upload','Admin\DokumenController@unggah')->name('upload')->middleware('auth');
Route::post('/kelola-berkas-hapus/{id}','Admin\DokumenController@destroy')->name('hapus')->middleware('auth');









// Route::group(['prefix'=>'logged','middleware'=>'CheckLogged'],function(){

    Route::group(['prefix' => '/user','middleware'=>'cekLogged'],function () {
        Route::get('/{id}','User\DashboardController@index')->name('cekLogin');
        Route::get('{id}/perkara','User\PerkaraController@index');
        Route::get('{id}/dataumum','User\DataUmumController@index');
        Route::get('{id}/penetapan','User\PenetapanController@index');
        Route::get('{id}/jadwal','User\SidangController@index');
        Route::get('{id}/putusan','User\PutusanController@index');
        Route::get('{id}/putusan/download-file','User\PutusanController@downloadFile')->name('download-file');
        Route::get('{id}/biaya','User\BiayaController@index');
        Route::post('{id}/jadwal/ambil_antrian','User\SidangController@store')->name('ambil-antrian');

    });
   
   
// });
