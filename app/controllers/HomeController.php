<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	// protected $template ='template/main'; 

	public function index()
	{
		$data = DB::table('buku')->get();
		$kategori = DB::table('kategori')->get();
		$data = [
		'data'=>$data,
		'kategori'=>$kategori
		];
		// dd($kategori);
		return View::make('home/main',$data)->withTitle('');

	}

	public function cari()
	{
		$keyword = Input::get('search');
		$kategori = Input::get('kategori');

		if (empty($keyword)) {
			$data = DB::table('buku')->get();
			
			
		}else{

			if ($kategori==0) {
				// ketika kategori 0 atau semua kategori maka cari semua buku
				$data = DB::table('buku')
				->select('id','judul','harga','gambar','penulis')				
				->where('judul', 'LIKE', '%'.$keyword.'%')
				->orWhere('penulis','LIKE','%'.$keyword.'%')
				->get();

			}
			else{
				// ketika kategori bukan 0 maka tampilkan judul, harga, penulis dan id dimana kategori = $kategori kemudian
				// menggunakan subquery menjadi and (where judul like $keyword or penulis like $keyword
				// sql select judul,harga,buku,gambar from buku where kategori_id=2 and (judul like '%radit%'  or penulis  like '%radit%')
				
				$data = DB::table('buku')
				->select('id','judul','harga','penulis','gambar')
				->where('kategori_id','=',$kategori)
				->where(function($query){
					$keyword = Input::get('search');
					$query->where('judul', 'LIKE', '%'.$keyword.'%')
						  ->orWhere('penulis','LIKE','%'.$keyword.'%');
				})
				->get();
			}	
		}
		$data = [
			'data'=>$data
			];

		return View::make('pencarian/index',$data)->withTitle('Pencarian');
	} //end func cari()

	public function keranjang()
	{
		return View::make('keranjang/index')->withTitle('Keranjang');	
	}

} //end class home
