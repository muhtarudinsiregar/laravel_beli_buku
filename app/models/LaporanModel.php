<?php 	
		/**
		* 
		*/
		class LaporanModel
		{
			public function get_data_report()
			{
				return DB::select(
					'SELECT DATE_FORMAT(tanggal_transaksi,"%M %Y") AS tanggal,sum(total_harga) as total 
					FROM keranjang 
					GROUP BY YEAR(tanggal_transaksi), MONTH(tanggal_transaksi)');
			}

			public function get_tanggal()
			{
				// return DB::select('select DATE_FORMAT(tanggal_transaksi,"%M %Y") AS tanggal from keranjang group by YEAR(tanggal_transaksi),MONTH(tanggal_transaksi)');
				// return DB:select('DATE_FORMAT(tanggal_transaksi,"%M %Y") AS tanggal from keranjang GROUP BY YEAR(tanggal_transaksi), MONTH(tanggal_transaksi)');
			}
		}
 ?>