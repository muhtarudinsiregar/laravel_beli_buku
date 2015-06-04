<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){
		$this->LoginModel = new LoginModel();
		// return $this;
	}

	public function index()
	{
		if (Session::has('userdata')) {
			return Redirect::to('anggota/dashboard');
		}else
		// var_dump(Session::all());
		return View::make('login.login')->withTitle('Login');
	}

	public function daftar()
	{
		return View::make('login.daftar')->withTitle('Pendaftaran');
	}

	public function validasi()
	{
		// ambil inputan form
		$data_input = array(
			'nama'=>Input::get('nama'),
			'email'=>Input::get('email'),
			'password'=>Hash::make(Input::get('password')),
			'no_hp'=>Input::get('no_hp'),
			'level'=>"anggota"
			);
		// setting aturan untuk validasi
		$rules = array(
			'email'=>'required|email|unique:users',
			'nama'=>'required|min:3',
			'no_hp'=>'required|numeric|digits_between:11,12',
			'password'=>'required|min:5|confirmed',
			'password_confirmation'=>'required|min:5'
			);
		// custom pesan error 
		$messages = array(
			'required' => 'Bagian :attribute Harus diisi ',
			'email'=> 'Bagian :attribute Harus Valid',
			'digits_between'=>'Bagian :attribute Minimal 11 dan Maks 12',
			'unique'=>'Bagian :atribute sudah ada yang menggunakan',
			'min'=>'Bagian :atribute minimal 3',
			'numeric'=>'Bagian :atribute harus angka'
			);
		
		$validator = Validator::make(Input::all(), $rules,$messages);
		if ($validator->fails()) {

			return Redirect::to('daftar')->withInput()->withErrors($validator);
		}else{
			$this->LoginModel->simpan($data_input);
			Session::flash('pesan','Berhasil Mendaftar Sebagai Anggota');
			return Redirect::to('daftar');
		}
	}
	// buat validator dari input, rules dan pesan
		// lalu jika validator fail redirect
		// jika sukses simpan data

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
				Session::put('userdata',array(
					'id'=>Auth::user()->id,
					'level'=>Auth::user()->level,
					));
				return Redirect::intended('admin/penulis');
			}elseif (Auth::attempt(array('email'=>$userdata['email'],'password'=>$userdata['password'],'level'=>'anggota'))) {
				Session::put('userdata',array(
					'id'=>Auth::user()->id,
					'level'=>Auth::user()->level,
					));
				return Redirect::intended('anggota/dashboard');
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
		Session::forget('userdata');
		return Redirect::intended('/');
	}


}
