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
			->select(
				'b.gambar','b.id_bk','b.harga','b.judul',
				'b.tahun','p.nama as penulis','p.id_pen','k.nama as kategori'
				)
			->get();
		}

		public function simpan_buku($data)
		{
			DB::table('buku')->insert($data);
		}
		public function kategori()
		{
			return DB::table('kategori')->get();
		}

		public function penulis()
		{
			return DB::table('penulis')->get();
		}

		public function nama_gambar($id)
		{
			return DB::table('buku')->select('gambar')->where('id_bk',$id)->first();
		}
		public function hapus($id)
		{
			DB::table('buku')->where('id_bk',$id)->delete();
		}

		public function edit($id)
		{
			return DB::table('buku')->where('id_bk',$id)->first();
		}

		public function update($id,$data)
		{
			DB::table('buku')->where('id_bk',$id)->update($data);
		}



	}
	?>