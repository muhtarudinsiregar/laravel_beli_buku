<?php

class BukuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $template = 'layout.main';

	public function index()
	{
		$data = DB::table('penulis AS p')
		->join('buku AS b','p.id_pen','=','b.id_pen')
		->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
		->select('b.id_bk','b.harga','b.judul','b.tahun','p.nama as penulis','k.nama as kategori')
		->get();
		$data = array(
			'data'=>$data
			);
		return View::make('buku.list', $data)->withTitle('List Buku');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// $this->layout->content = 
		$kategori = DB::table('kategori')->get();
		$penulis = DB::table('penulis')->get();
		$data = array(
			'kategori'=>$kategori,
			'penulis'=>$penulis
			);

		return View::make('buku.create',$data)->withTitle('Tambah Buku');
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// echo "string";
		// var_dump(Input::all());	
		// memasukkkan data ke tabel dgn autorincreament id
		DB::table('buku')->insert(
			array(
				'judul' => Input::get('judul'),
				'harga' => Input::get('harga'),
				'id_pen' => Input::get('penulis'),
				'id_ktgr' => Input::get('kategori'),
				'tahun' => Input::get('tahun'),
				'gambar' => "Pic",
				'deskripsi' => Input::get('deskripsi')

			)
		);




		return Redirect::to('admin/buku/create');


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		// echo "stringaaa";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$buku = DB::table('penulis AS p')
		->join('buku AS b','p.id_pen','=','b.id_pen')
		->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
		->select('b.id_bk','b.harga','b.judul','b.tahun','p.nama as penulis','k.nama as kategori')
		->where('b.id_bk',$id)
		->first();
		// $buku = DB::table('buku')->where('id_bk',$id)->get();
		// var_dump($buku);
		$kategori = DB::table('kategori')->get();
		$penulis = DB::table('penulis')->get();
		
		$data = array(
			'buku'=>$buku,
			'kategori'=>$kategori,
			'penulis'=>$penulis,
			);


		// var_dump($data);
		return View::make('buku.edit',$data)->withTitle('Edit Buku');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('buku')
		->where('id_bk',$id)
		->update(array(
			'judul' => Input::get('judul'),
				'harga' => Input::get('harga'),
				'id_pen' => Input::get('penulis'),
				'id_ktgr' => Input::get('kategori'),
				'tahun' => Input::get('tahun'),
				'gambar' => "Pic",
				'deskripsi' => Input::get('deskripsi')
			));

		Session::flash('message', 'Kategori Telah Diperbarui');
		return Redirect::to('admin/buku/'.$id.'/edit');


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('buku')->where('id_bk',$id)->delete();
		return Redirect::to('admin/buku');
	}


}
