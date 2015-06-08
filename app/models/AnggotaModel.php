<?php 
	/**
	* 
	*/
	class AnggotaModel
	{
		public function get_pemesanan($id_usr)
		{
			return DB::table('pemesanan')->select('id_pmsn','id_usr','total_harga','tanggal_pemesanan')->where('id_usr','=',$id_usr)->get();
		}

		public function detail_pemesanan($id)
		{
			return DB::table('pemesanan as p')
				->select('pd.id_bk','b.harga','b.judul','pd.jumlah','p.total_harga','gambar')
				->join('pemesanan_detail as pd','p.id_pmsn','=','pd.id_pmsn')
				->join('buku as b','pd.id_bk','=','b.id_bk')
				->where('p.id_pmsn','=',$id)
				->orderBy('tanggal_pemesanan', 'asc')
				->get();
		}
		
	}
 ?>