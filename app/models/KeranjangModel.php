<?php 
Class KeranjangModel
{
	public function get_cart($session)
	{
		return $data = DB::table('keranjang as k')
		->select('judul','harga','jml_bk','total_harga','b.id_bk','gambar')
		->join('buku as b','k.id_bk','=','b.id_bk')
		->where('session_id','=',$session)->get();
	}

	public function get_book($buku_id)
	{
		return $data= DB::table('buku')->select('harga','judul')->where('id_bk','=',$buku_id)->first();
	}
	public function store($jumlah,$data)
	{

		DB::table('keranjang')->insert(array(
			'id_bk'=>Input::get('id_bk'),
			'session_id'=>Session::getId(),
			"jml_bk"=>$jumlah,
			'total_harga'=>$jumlah*$data->harga
			));
	}

	public function total_harga($session_id)
	{
		return $total = DB::table('keranjang')
			->select(DB::raw('SUM(total_harga) as total'))
			->where('session_id','=',$session_id)
			->first();
	}

	public function get_book_name($id)
	{
		return DB::select('select id_bk,judul,gambar,harga from buku where id_bk in('.$id.')');
		// return $total = DB::table('buku')->select('id_bk','gambar','harga')->where('id_bk','in',$id)->get();

	}
}



?>