<?php

class AnggotaController extends \BaseController {

	public function __construct()
	{
		$this->anggota_model = new AnggotaModel();
		
	}
	
	public function index()
	{
		$id = Auth::user()->id;
		$data_pemesanan = $this->anggota_model->get_pemesanan($id);
		return View::make('anggota.dashboard')->withTitle('Dashboard')->with('data_pemesanan',$data_pemesanan);
	}
	public function detail_pemesanan($id_pemesanan)
	{
		$detail_pemesanan = $this->anggota_model->detail_pemesanan($id_pemesanan);
		return View::make('anggota.detail_pemesanan')->withTitle('Detail Pemesanan')->with('detail_pemesanan',$detail_pemesanan);
	}


}