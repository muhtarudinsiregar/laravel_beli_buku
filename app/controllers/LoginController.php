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
			if (Auth::attempt($userdata)) {
				return Redirect::to('penulis');
			}else{
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
