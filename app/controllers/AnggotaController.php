<?php

class AnggotaController extends \BaseController {

	public function __construct()
	{
		$anggota_model = new AnggotaModel();
		
	}
	
	public function index()
	{
		return View::make('anggota.dashboard')->withTitle('Dashboard');
	}
	public function detail_pemesanan($id_pemesanan)
	{
		
	}


}