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

Route::get('tes', "HomeController@tes");
// route untuk menampilkan hasil pencarian
Route::get('cari','HomeController@cari');
//route halaman utama 
Route::get('/','HomeController@index');

Route::group(array('before'=>'auth'),function(){
	//route dengan prefix admin hanya boleh dimasuki oleh admin lalu terdapat filter hanya admin yang boleh masuk.
	Route::group(array('prefix'=>'admin','before'=>'admin'), function(){
		// route untuk crud  buku dengan resource
		Route::resource('buku', 'BukuController');
// route untuk penulis
		Route::resource('penulis','PenulisController');
// route untuk kategori 
		Route::resource('kategori', 'Kategoricontroller');
	}); //end group admin dan filter

}); //end group auth
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

Route::get('home/show/{id}',array('as'=>'tampil','uses'=>'HomeController@show'));

Route::resource('keranjang', 'KeranjangController');

Route::get('kategori/{id}', 'HomeController@kategori_detail');
Route::get('laporan', 'LaporanController@index');
Route::post('export', 'LaporanController@exportPdf');
Route::post('dompdf', 'LaporanController@dompdf');
Route::get('generate',function(){
	return View::make('laporan/tes');
});
View::composer('dashboard/anggota', function($view) 
{
    $kategori = DB::table('kategori')->get();
    $view->with('kategori', $kategori);
});
