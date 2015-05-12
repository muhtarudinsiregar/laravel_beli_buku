<?php

class AnggotaController extends \BaseController {

	public function __construct()
	{
		// $anggota = new AnggotaModel();
		
	}
	
	public function index()
	{
		return View::make('anggota.dashboard')->withTitle('Dashboard');
	}

}