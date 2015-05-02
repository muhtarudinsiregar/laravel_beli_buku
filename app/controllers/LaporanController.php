<?php 
class LaporanController extends \BaseController
{
	public function __construct(){
		$this->laporan = new LaporanModel();
		// return $this;
	}

	public function index()
	{
		$data = $this->laporan->get_report();
		return View::make('laporan/laporan')->withTitle('Laporan');
	}
}
?>