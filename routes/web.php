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

// Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('/pendaftar', 'PendaftarController');
    Route::get('/survey', 'PendaftarController@survey');
    Route::resource('/wilayah', 'WilayahController');
});
Route::get('/provinsi', 'WilayahController@provinsi');
Route::get('/kabupaten/{id}', 'WilayahController@kabupaten');
Route::get('/kecamatan/{id}', 'WilayahController@kecamatan');
Route::get('/desa/{id}', 'WilayahController@desa');
