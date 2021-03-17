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
//Route Home
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');

//Route Di User
//Route infokeguser
Route::get('/infokeguser', 'InfokeguserController@index');
Route::get('/infokeguser/{id}','InfokeguserController@readmore');

//Route pengumuman user
Route::get('/pengumumanuser', 'pengumumanuserController@index');
Route::get('/pengumumanuser/{id}','pengumumanuserController@readmore');

//Route Data Anggota Di User
Route::get('/anggotauser','AnggotauserController@index');

//Route visimisi
Route::get('/visimisi','VisimisiController@index');


//Route Cari Di Index
Route::get('/cari', 'CariController@cari');

//Route admin
Route::get('/admin', 'AdminController@index');

//Route Di Admin
//Route anggota
Route::get('/anggota', 'AnggotaController@index');
Route::get('/anggota/tambah', 'AnggotaController@tambah');
Route::post('/anggota/store', 'AnggotaController@store');
Route::get('/anggota/edit/{id}', 'AnggotaController@edit');
Route::post('/anggota/update/{id}', 'AnggotaController@update');
Route::get('/anggota/hapus/{id}', 'AnggotaController@destroy');
Route::get('/anggota/cari', 'AnggotaController@search');
Route::get('/anggota/cetak', 'AnggotaController@cetak_pdf');

//Route infokeg
Route::get('/infokeg', 'InfokegController@index');
Route::get('/infokeg/tambah', 'InfokegController@tambah');
Route::post('/infokeg/store', 'InfokegController@store');
Route::get('/infokeg/edit/{id}', 'InfokegController@edit');
Route::post('/infokeg/update/{id}', 'InfokegController@update');
Route::get('/infokeg/hapus/{id}', 'InfokegController@destroy');
Route::get('/infokeg/cari', 'InfokegController@search');
Route::get('/infokeg/cetak', 'InfokegController@cetak_pdf');


//Route Pengumuman
Route::get('/pengumuman', 'PengumumanController@index');
Route::get('/pengumuman/tambah', 'PengumumanController@tambah');
Route::post('/pengumuman/store', 'PengumumanController@store');
Route::get('/pengumuman/edit/{id}', 'PengumumanController@edit');
Route::post('/pengumuman/update/{id}', 'PengumumanController@update');
Route::get('/pengumuman/hapus/{id}', 'PengumumanController@destroy');
Route::get('/pengumuman/cari', 'PengumumanController@search');

//Route Data Admin
Route::get('/dataadmin', 'AdminController@dataadmin');
Route::get('/dataadmin/hapus/{id}', 'AdminController@dataadminhapus');
Route::get('/dataadmincari', 'AdminController@dataadmincari');

//Route Login
//Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('logout', 'AuthController@logout')->name('logout');
 
});