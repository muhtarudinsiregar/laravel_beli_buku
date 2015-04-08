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


// route untuk menampilkan hasil pencarian
Route::get('cari','HomeController@cari');

// route untuk crud  buku dengan resource
Route::resource('buku', 'BukuController');

//route halaman utama 
Route::get('/','HomeController@index');

//route untuk menampilkan isi keranjang 
Route::get('keranjang','HomeController@keranjang');
