<?php 
	/**
	* 
	*/
	class HomeModel
	{
		public function Tampil()
		{
			return $data = DB::table('buku AS b')
			->join('penulis AS p','b.id_pen','=','p.id_pen')
			->select('id_bk','judul','harga','gambar','p.nama')
			->get();
		}

		public function Cari($keyword)
		{
			return $data = DB::table('buku AS b')
			->select('id_bk','judul','harga','gambar','p.nama')
			->join('penulis AS p','b.id_pen','=','p.id_pen')
			->where('judul', 'LIKE', '%'.$keyword.'%')
			->orWhere('p.nama','LIKE','%'.$keyword.'%')
			->get();
		}

		public function Show($id)
		{
			return $data = DB::table('buku AS b')
			->join('penulis AS p','b.id_pen','=','p.id_pen')
			->where('id_bk', '=',$id)
			->select('id_bk','judul','harga','gambar','p.nama','p.profil','deskripsi')
			->first();
		}

		public function kategori_detail($id)
		{
			return $data = DB::table('buku AS b')
			->select('id_bk','judul','harga','gambar','k.nama')
			->join('kategori AS k','b.id_ktgr','=','k.id_ktgr')
			->where('k.id_ktgr', '=',$id)
			->get();
		}

		

	}

	?>