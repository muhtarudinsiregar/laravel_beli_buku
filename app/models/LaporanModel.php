<?php 	
		/**
		* 
		*/
		class LaporanModel
		{
			public function get_report()
			{
				return DB::select(
					'SELECT DATE_FORMAT(tanggal_transaksi,"%M %Y") AS tanggal, sum(total_harga) as total 
					FROM keranjang 
					GROUP BY YEAR(tanggal_transaksi), MONTH(tanggal_transaksi)');
			}
		}
 ?>