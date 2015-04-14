<?php

class KategoriController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = DB::table('kategori')->get();

		$data = array(
			'data'=>$data
			);
		return View::make('kategori.list', $data)->withTitle('List Kategori');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('kategori.create')->withTitle('Tambah Kategori');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('kategori')->insert(array(
			'nama'=>Input::get('kategori')
			));
		return Redirect::to('kategori/create');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kategori = DB::table('kategori')
		->where('id_ktgr',$id)
		->first();
		$kategori = [
		'kategori'=>$kategori
		];
		return View::make('kategori.edit', $kategori)->withTitle('Edit Penulis');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('kategori')
		->where('id_ktgr',$id)
		->update(array(
			'nama'=>Input::get('nama')
			));
		Session::flash('message', 'Kategori Telah Diperbarui');
		return Redirect::to('kategori/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('kategori')
		->where('id_ktgr',$id)
		->delete();

		Session::flash('message', 'Data Berhasil Dihapus');
		return Redirect::to('kategori');
	}


}
