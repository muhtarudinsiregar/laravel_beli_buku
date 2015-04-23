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
		$data = DB::table('buku AS b')
		->join('penulis AS p','b.id_pen','=','p.id_pen')
		->select('id_bk','judul','harga','gambar','p.nama')
		->get();
		$data = [
			'data'=>$data
		];
		return View::make('home/main',$data)->withTitle('');

	}

	public function cari()
	{
		$keyword = Input::get('search');

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
		$kategori = DB::table('kategori')->get();
		$data = [
		'data'=>$data,
		'kategori'=>$kategori
		];

		
		return View::make('pencarian/index',$data)->withTitle('Pencarian');
	} //end func cari()

	public function show($id)
	{	
		$data = DB::table('buku AS b')
		->join('penulis AS p','b.id_pen','=','p.id_pen')
		->where('id_bk', '=',$id)
		->select('id_bk','judul','harga','gambar','p.nama','p.profil','deskripsi')
		->first();
		$data = [
		'data'=>$data
		];
		return View::make('pencarian/detail_buku',$data)->withTitle('Buku');
	}
	public function keranjang()
	{
		// echo "asas";
		return View::make('keranjang/index')->withTitle('Keranjang');	
	}

	public function kategori_detail($id)
	{
		$data = DB::table('buku AS b')
		->select('id_bk','judul','harga','gambar','k.nama')
		->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
		->where('k.id_ktgr', '=',$id)
		->get();
		// dd($data);
		$data = [
		'data'=>$data
		];
		return View::make('home/kategori_detail',$data)->withTitle('Kategori');
	}

} //end class home
