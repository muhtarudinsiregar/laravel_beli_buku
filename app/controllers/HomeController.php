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

		if (empty($keyword)) {
			$data = DB::table('buku AS b')
			->join('penulis AS p','b.id_pen','=','p.id_pen')
			->select('b.id_bk','b.harga','b.judul','b.gambar','p.nama')
			->take(10)
			->get();
		}else{

			// fungsi cari buku berdasarkan nama penulis dan judul menggunakan query builder

			$data = DB::table('buku AS b')
					->join('penulis AS p','b.id_pen','=','p.id_pen')
					->where('judul', 'LIKE', '%'.$keyword.'%')
					->orWhere('p.nama','LIKE','%'.$keyword.'%')
					->select('id_bk','judul','harga','gambar','p.nama')
					->get();

			// pencarian menggunakan raw query

			// $data = DB::select("select id_bk,judul,harga,gambar,p.nama from buku as b 
			// 	join penulis as p 
			// 	on(b.id_pen=p.id_pen) where judul like '%$keyword%' or p.nama like '%$keyword%'");
		}
		// var_dump($data);
		$data = [
		'data'=>$data
		];

		// var_dump($data);
		return View::make('pencarian/index',$data)->withTitle('Pencarian');
	} //end func cari()

	public function keranjang()
	{
		return View::make('keranjang/index')->withTitle('Keranjang');	
	}

} //end class home
