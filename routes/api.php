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

Route::post('login','\App\Http\Controllers\Api\LoginController@login');
Route::get('data-umum/{id}','\App\Http\Controllers\Api\LoginController@dataUmumGetId');
Route::get('penetapan/{id}','\App\Http\Controllers\Api\LoginController@penetepanGetId');
Route::get('putusan/{id}','\App\Http\Controllers\Api\LoginController@putusanGetId');
Route::get('sidang/{id}','\App\Http\Controllers\Api\LoginController@jadwalGetId');
Route::get('data-jadwal/{id}','\App\Http\Controllers\Api\LoginController@jadwalGetId');
Route::get('biaya/{id}','\App\Http\Controllers\Api\LoginController@biayaGetId');
Route::post('ambil-antrian','\App\Http\Controllers\Api\LoginController@AmbilAntrian');
Route::post('downloadFile','\App\Http\Controllers\Api\LoginController@downloadFile');
