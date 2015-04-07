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
		
		return View::make('home/main')->withTitle('');

	}

	public function cari()
	{
		$keyword = Input::get('search');

		if (empty($keyword)) {
			$data = Home::all();
			$data = [
				'data'=>$data
			];
			// return View::make('pencarian/index',$data);
		}else{

			$data = Home::where('penulis','LIKE',$keyword)->get();
			$data = [
				'data'=>$data
			];
			
		}

		return View::make('pencarian/index',$data)->withTitle('pencarian');
	} //end func cari()

	public function keranjang()
	{
		return View::make('keranjang/index')->withTitle('Keranjang');	
	}

} //end class home
