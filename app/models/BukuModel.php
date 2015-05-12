<?php 
	/**
	* 
	*/
	class BukuModel
	{
		public function get_buku()
		{
			return $data = DB::table('penulis AS p')
			->join('buku AS b','p.id_pen','=','b.id_pen')
			->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
			->select('b.gambar','b.id_bk','b.harga','b.judul','b.tahun','p.nama as penulis','k.nama as kategori')
			->get();
		}
	}
	?>