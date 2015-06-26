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
		// var_dump($data);
		return View::make('laporan/laporan')->withTitle('Laporan')->with('data_tanggal',$data_tanggal)->with('data_penjualan',$data_penjualan);
	}

	public function exportPdf()
	{	$total 	= $this->laporan->get_total();
		$data =array(
			'data'=>$this->laporan->get_data_report(),
			'total'=>number_format($total,0,',','.')
		);
		// var_dump($data['total']);
		$pdf = PDF::loadView('laporan.generate',$data);
		return $pdf->download('laporan.pdf');
	}

// 	public function dompdf()
// 	{
// 		require_once __DIR__.'/vendor/autoload.php';

// // inhibit DOMPDF's auto-loader
// define('DOMPDF_ENABLE_AUTOLOAD', false);

// //include the DOMPDF config file (required)
// require 'vendor/dompdf/dompdf/dompdf_config.inc.php';

// //if you get errors about missing classes please also add:
// require_once('vendor/dompdf/dompdf/include/autoload.inc.php');

// 		$html =
// 		'<html><body>'.
// 		'<p>Put your html here, or generate it with your favourite '.
// 		'templating system.</p>'.
// 		'</body></html>';

// 		$dompdf = new \DomPDF();
// 		$dompdf->load_html($html);
// 		$dompdf->render();
// 		$dompdf->stream("sample.pdf");

// 	}
}
?>