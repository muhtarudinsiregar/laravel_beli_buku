<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login.login')->withTitle('Login');
	}

	public function daftar()
	{
		return View::make('login.daftar')->withTitle('Pendaftaran');
	}

	public function store()
	{
		$rules = array(
			'nama'=>'required',
			'email'=>'required|email|unique:users',
			'no_hp'=>'required|min:10|numeric',
			'password'=>'required|min:8',
			're_password'=>'min:8|same:password'
			);
		$messages = [
			'nama.required'=>'Nama Lengkap harus diisi',
			'email.required'=>'Email harus diisi',
			'no_hp.required'=>'Nomor HP harus diisi',
			'password.required'=>'Password harus diisi',
			're_password.same'=>'Password Tidak Sama',
			're_password.required'=>'Ulangi Password harus diisi',
			'password.max'=>'Password Tidak Sama',
			're_password.max'=>'Password Tidak Sama',
		];
		$validator = Validator::make(Input::all(), $rules,$messages);
		if ($validator->fails()) {

			return Redirect::back()->withInput()->withErrors($validator);
		}else{
			DB::table('users')->insert(
				array(
					'nama'=>Input::get('nama'),
					'email'=>Input::get('email'),
					'password'=>Hash::make(Input::get('password')),
					'no_hp'=>Input::get('no_hp'),
					'level'=>"anggota"
					)
				);
			return Redirect::to('daftar');
		}

	}

	public function proses()
	{
		$rules = [
		'email'=>'required|email',
		'password'=>'required|min:5'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$userdata = [
			'email'=>Input::get('email'),
			'password'=>Input::get('password'),
			];

			// DB::table('users')->where('email',Input::get('email'))->first()

			if (Auth::attempt(array('email'=>$userdata['email'],'password'=>$userdata['password'],'level'=>'admin'))) {
				return Redirect::intended('admin/penulis');
			}elseif (Auth::attempt(array('email'=>$userdata['email'],'password'=>$userdata['password'],'level'=>'anggota'))) {
				return Redirect::intended('admin/penulis');
			}else{
				// $data = Hash::make(Input::all());
				var_dump($userdata);
				// echo "string";
				// return Redirect::to('login');
			} //end if kedua
		} //ends if pertama
	} // ends fungsi proses

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}


}
