<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

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

//Route Login
Route::get('/login','LoginController@index');
Route::post('/auth-login','LoginController@authlogin');
Route::get('/logout','LoginController@logout');

//LandingPage
Route::get('/','LandingController@index');
Route::get('/detail/{id}','LandingController@detail');
Route::get('/contact','LandingController@contact');
Route::get('/daftar-buku','LandingController@buku');
Route::get('/login-pinjam/{id}','LandingController@login_pinjam');
Route::get('/user-pinjam/{id}','LandingController@user_pinjam');
Route::post('/validasi/{id}','LandingController@validasi');

//Middleware Admin

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {

//Route Buku
Route::get('/book', 'BukuController@index');
Route::get('/book-create', 'BukuController@create');
Route::get('/book-edit/{id}', 'BukuController@edit');
Route::get('/book-delete/{id}', 'BukuController@delete');
Route::post('/book-update/{id}', 'BukuController@update');
Route::post('/book-save','BukuController@save');

//Route Siswa
Route::get('/data-siswa', 'SiswaController@index');
Route::get('/siswa-create', 'SiswaController@create');
Route::post('/siswa-save', 'SiswaController@save');
Route::get('/siswa-edit/{id}', 'SiswaController@edit');
Route::post('/siswa-update/{id}', 'SiswaController@update');
Route::get('/siswa-delete/{id}', 'SiswaController@delete');

//Route pinjaman
Route::get('/pinjaman', 'PinjamanController@index');
Route::get('/pinjaman-create', 'PinjamanController@create');
Route::post('/pinjaman-save', 'PinjamanController@save');
Route::get('/pinjaman-edit/{id}', 'PinjamanController@edit');
Route::post('/pinjaman-update/{id}', 'PinjamanController@update');
Route::get('/pinjaman-delete/{id}', 'PinjamanController@delete');
Route::post('/pinjaman-kembali/{id}', 'PinjamanController@kembali');
Route::get('/setuju/{id}','PinjamanController@setuju');
Route::get('/tolak/{id}','PinjamanController@tolak');
});

//Middleware Users
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function() {


    Route::get('/profile/{id}','LandingController@profile');
    Route::get('/form-peminjaman/{id}/{id2}','LandingController@form_pinjam');
    Route::post('/simpan-peminjaman/{id}','LandingController@simpan');

});

