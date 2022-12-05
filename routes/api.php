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

// endpoint mahasiswa
Route::get('/mahasiswa', 'MahasiswaController@index');
Route::get('/mahasiswa/{id}', 'MahasiswaController@show');
Route::post('/mahasiswa', 'MahasiswaController@store');
Route::put('/mahasiswa/{id?}', 'MahasiswaController@update');
Route::delete('/mahasiswa/{id?}', 'MahasiswaController@destroy');

//endpoint dosen
Route::get('/dosen', 'DosenController@index');
Route::get('/dosen/{id}', 'DosenController@show');
Route::post('/dosen', 'DosenController@store');
Route::put('/dosen/{id?}', 'DosenController@update');
Route::delete('/dosen/{id?}', 'DosenController@destroy');
