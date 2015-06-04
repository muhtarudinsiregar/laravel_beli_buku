<?php 	
		/**
		* 
		*/
		class LaporanModel
		{
			public function get_data_report()
			{
				return DB::select(
					'SELECT DATE_FORMAT(tanggal_pemesanan,"%M %Y") AS tanggal,sum(total_harga) as total 
					FROM pemesanan 
					GROUP BY YEAR(tanggal_pemesanan), MONTH(tanggal_pemesanan)');
			}

			public function get_total()
			{
				return $total = DB::table('pemesanan')->sum('total_harga');
			}
		}
 ?>