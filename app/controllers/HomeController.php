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
	public function __construct(){
		$this->home = new HomeModel();
		// return $this;
	}

	public function index()
	{
		// $data = DB::table('buku AS b')
		// ->join('penulis AS p','b.id_pen','=','p.id_pen')
		// ->select('id_bk','judul','harga','gambar','p.nama')
		// ->get();

		
		$data = $this->home->Tampil();
		// $data = Home::Tampil();
		$data = [
			'data'=>$data
		];
			// var_dump($data);
		return View::make('home/main',$data)->withTitle('');

	}
		// $data = [
		// 'data'=>$this->home->Cari($keyword)
		// ];

	public function cari()
	{
		$keyword = Input::get('search');
		$data = $this->home->Cari($keyword); 
		return View::make('home/pencarian')->with('data',$data)->withTitle('Pencarian');
	} //end func cari()

	public function show($id)
	{	
		$data = [
		'data'=>$this->home->Show($id)
		];
		return View::make('home/detail_buku',$data)->withTitle('Buku');
	}
	public function keranjang()
	{
		return View::make('keranjang/index')->withTitle('Keranjang');	
	}

	public function kategori_detail($id)
	{
		$data = [
		'data'=>$this->home->kategori_detail($id)
		];

		return View::make('home/kategori_detail',$data)	->withTitle('Kategori');
	}

	// public function tes()
	// {
	// 	$name = DB::table('buku')->get();
	// 	var_dump($name);
	// }
} //end class home
