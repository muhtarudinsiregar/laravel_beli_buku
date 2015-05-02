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

	public function exportPdf()
	{	$total 	= $this->laporan->get_total();
		$data 	= $this->laporan->get_data_report();
		$data =[
			'data'=>$data,
			'total'=>number_format($total,0,',','.') 
		];
		// var_dump($data['total']);
		$pdf = PDF::loadView('laporan.generate',$data);
		return $pdf->download('laporan.pdf');
	}
}
?>