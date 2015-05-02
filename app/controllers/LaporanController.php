<?php 
class LaporanController extends \BaseController
{
	public function __construct(){
		$this->laporan = new LaporanModel();
		// return $this;
	}

	public function index()
	{
		$data = $this->laporan->get_data_report();
		$data_penjualan=[];
		$data_tanggal = [];
		// var_dump($data);
		foreach ($data as $value) {
			array_push($data_penjualan, $value->total);
			array_push($data_tanggal, $value->tanggal);
		}

		return View::make('laporan/laporan')->withTitle('Laporan')->with('data_tanggal',$data_tanggal)->with('data_penjualan',$data_penjualan);
	}
}
?>