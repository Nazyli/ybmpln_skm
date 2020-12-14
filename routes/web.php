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

Route::get('/dashboard', 'DashboardController@index');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');
});
Route::get('/pendaftar', 'PendaftarController@index');
Route::get('/pendaftar', 'PendaftarController@provinsi');
Route::get('/kabupaten/{id}','ProvinsiController@kabupaten');
Route::get('/kecamatan/{id}','ProvinsiController@kecamatan');
Route::get('/desa/{id}','ProvinsiController@desa');