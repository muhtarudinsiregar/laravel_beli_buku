<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::group(array('before'=>'auth'),function(){



// route untuk menampilkan hasil pencarian
Route::get('cari','HomeController@cari');

// route untuk crud  buku dengan resource
Route::resource('buku', 'BukuController');

//route halaman utama 
Route::get('/','HomeController@index');
// route untuk penulis
Route::resource('penulis','PenulisController');

Route::resource('kategori', 'Kategoricontroller');
});
//route untuk menampilkan isi keranjang 
Route::get('keranjang','HomeController@keranjang');
//route menampilkan halaman login
Route::get('login','LoginController@index');
//route untuk autentifikasi user
Route::post('proses','LoginController@proses');
// route logout
Route::get('logout','LoginController@logout');
// menampilkan halaman pendaftaran
Route::get('daftar','LoginController@daftar');
// otentifikasi pendaftaran
Route::post('store','LoginController@store');
