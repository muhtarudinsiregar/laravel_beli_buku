<?php

class BukuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	// protected $template = 'layout.main';
	public function __construct(){
		$this->BukuModel = new BukuModel();
		// return $this;
	}

	public function index()
	{
		$data = array(
			'data'=>$this->BukuModel->get_buku()
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
		$data = array(
			'kategori'=>$this->BukuModel->kategori(),
			'penulis'=>$this->BukuModel->penulis()
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
		$gambar = Input::file('gambar');
		$filename = $gambar->getClientOriginalName();
		$gambar->move("public/img", $filename);
		$data = array(
			'judul' => Input::get('judul'),
			'harga' => Input::get('harga'),
			'id_pen' => Input::get('penulis'),
			'id_ktgr' => Input::get('kategori'),
			'tahun' => Input::get('tahun'),
			'gambar' => $filename,
			'deskripsi' => Input::get('deskripsi')
			);
		$this->BukuModel->simpan_buku($data);
		Session::flash('notif', 'Berhasil Menambah Buku Baru');
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

		$data = array(
			'buku'=>$this->BukuModel->edit($id),
			'kategori'=>$this->BukuModel->kategori(),
			'penulis'=>$this->BukuModel->penulis()
			);
		return View::make('buku.edit',$data)->withTitle('Edit Buku');
			// $buku = DB::table('penulis AS p')
		// ->join('buku AS b','p.id_pen','=','b.id_pen')
		// ->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
		// ->select('b.id_bk','b.harga','b.judul','b.tahun','p.nama as penulis','k.nama as kategori','b.harga','b.deskripsi')
		// ->where('b.id_bk',$id)
		// ->first();
		// $buku = DB::table('buku')->where('id_bk',$id)->first();
		// var_dump($buku);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gambar = Input::file('gambar');
		$delete = $this->BukuModel->edit($id);

		if ($gambar) {
			File::delete('public/img/'.$delete->gambar);
			$filename = $gambar->getClientOriginalName();
			$gambar->move("public/img", $filename);
			$data = array(
				'judul' => Input::get('judul'),
				'harga' => Input::get('harga'),
				'id_pen' => Input::get('penulis'),
				'id_ktgr' => Input::get('kategori'),
				'gambar' =>$filename,
				'tahun' => Input::get('tahun'),
				'deskripsi' => Input::get('deskripsi')
				);
			$this->BukuModel->update($id,$data);
		}else{
			$data = array(
				'judul' => Input::get('judul'),
				'harga' => Input::get('harga'),
				'id_pen' => Input::get('penulis'),
				'id_ktgr' => Input::get('kategori'),
				'tahun' => Input::get('tahun'),
				'deskripsi' => Input::get('deskripsi')
				);
			$this->BukuModel->update($id,$data);
		}
		
		Session::flash('notif', 'Buku Telah Diperbarui');
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
		$gambar = $this->BukuModel->nama_gambar($id);
		File::delete('public/img/'.$gambar->gambar);
		$this->BukuModel->hapus($id);
		Session::flash('notif', 'Gambar Berhasil Dihapus');
		return Redirect::to('admin/buku');
	}


}
