<?php

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


//Route admin
Route::get('/admin', 'AdminController@index');

//Route anggota
Route::get('/anggota', 'AnggotaController@index');
Route::get('/anggota/tambah', 'AnggotaController@tambah');
Route::post('/anggota/store', 'AnggotaController@store');
Route::get('/anggota/edit/{id}', 'AnggotaController@edit');
Route::post('/anggota/update/{id}', 'AnggotaController@update');
Route::get('/anggota/hapus/{id}', 'AnggotaController@destroy');