<?php

class PenulisController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = DB::table('penulis')->get();
		$data = [
			'data'=>$data
		];

		return View::make('penulis.list', $data)->withTitle('List Penulis');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('penulis/create')->withTitle('Tambah Penulis');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('penulis')->insert(
			array(
				'nama'=>Input::get('penulis'),
				'profil'=>Input::get('profil')
			));

		return Redirect::to('penulis/create');
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
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$penulis = DB::table('penulis')
					->where('id_pen',$id)
					->first();
		$penulis = [
			'penulis'=>$penulis
		];
		return View::make('penulis.edit', $penulis)->withTitle('Edit Penulis');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('penulis')
			->where('id_pen',$id)
			->update(array(
				'nama'=>Input::get('nama'),
				'profil'=>Input::get('profil')
				));
		Session::flash('message', 'Data Berhasil Berhasil Diperbarui');
		return Redirect::to('penulis/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('penulis')->where('id_pen',$id)->delete();
		return Redirect::to('penulis');
	}


}
