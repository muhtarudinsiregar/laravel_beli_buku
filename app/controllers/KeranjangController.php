<?php

class KeranjangController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(){
		$this->keranjang = new KeranjangModel();
		// return $this;
	}
	public function index()
	{	
		// dd(empty(Session::get('items')));
		if (Session::has('items'))
		{
			$data = Session::get('items');
			if (empty($data)) {
				// Session::flash('notif', 'Keranjang Kosong');
				$total = 0;	
				return View::make('keranjang/index')->withTitle('Keranjang')->with('total',$total);
			}else{
				foreach ($data as $value) {
				// echo $value['item_id'];
					// $id = array()
					$id[]=$value['item_id'];
					$jumlah[] = $value['item_quantity'];
				}
				$id_buku = implode(',',$id);
				// memasukkan id buku di session ke dalam database untuk mencari buku utu
				$data_book =$this->keranjang->get_book_name($id_buku);
				// memasukkan data jml buku dari session ke array yg ditampilkan
				foreach ($data as $key=> $value) {
					$data_book[$key]->jumlah_buku = $data[$key]['item_quantity'];
					$data_book[$key]->total = $data[$key]['item_quantity'] * $data_book[$key]->harga;
				// var_dump($data_book);
				}
				$total = 0;
				$jml_buku = 0;
				foreach ($data_book as $key => $value) {
					$total = $total + $value->total;
					$jml_buku = $jml_buku + $value->jumlah_buku;
				}
				// $data_buku = array(
				// 		'total_harga'=>$total,
				// 		'jumlah_buku'=>$jml_buku
				// 	);
				$data = array(
					'total'=>$total,
					'jumlah_buku'=>$jml_buku
					);
				Session::set('total_harga',$total);
				Session::set('jumlah_buku',$jml_buku);

				return View::make('keranjang/index',$data)->withTitle('Keranjang')->with('data_book',$data_book)->withNotif('');
			}
		}else{
			// dd(Session::all());
			$total = 0;
			return View::make('keranjang/index')->withTitle('Keranjang')->with('total',$total);
		}

		

		

		

		// ----------------------------using db for cart--------------------------------------------
		// $data = array(
		// 	'data'=>$this->keranjang->get_cart($session),
		// 	'total'=>$this->keranjang->total_harga($session)
		// 	);

		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		// $jumlah_buku = Input::get('jml_bk');
		// $id_buku = Input::get('id_bk');
		// var_dump(Input::has('addItem'));
		if (Input::get('jml_bk')) {
			if (Session::has('items')) {
				Session::push('items', [
					'item_id'=>Input::get('id_bk'),
					'item_quantity'=>Input::get('jml_bk')
					]);
				$array = Session::get('items');
				$total = array(); //move outside foreach loop because we don't want to reset it
				// var_dump($array);
				foreach ($array as $key => $value) {
					$id = $value['item_id'];
					$quantity = $value["item_quantity"];
					
					if (!isset($total[$id])) {
						$total[$id] = 0;
					}
					$data = $total[$id]	+=$quantity;
					// echo $total[$id];
				}
				//now convert our associative array from  array(actual_item_id => actual_item_quantity,....)
      			//into array(array('item_id' => actual_item_id, 'item_quantity' => actual_item_quantity), ....)
				$items = array();

				foreach ($total as $item_id => $item_quantity) {
					$items[]= array(
						'item_id'=>$item_id,
						'item_quantity'=>$item_quantity,
						);
					// var_dump($items);
				}
				Session::put('items', $items);
				// var_dump(Session::get('items'));
			}else{
				Session::put('items', [
					0 =>[
					'item_id'=>Input::get('id_bk'),
					'item_quantity'=>Input::get('jml_bk')
					]]);
			}
		}

		$data = Session::get('items');
		return Redirect::back()->with('notifikasi','Berhasil ');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($index)
	{
		$jumlah_buku = Input::get('jml_bk');

		$items = Session::get('items');
		$items[$index]['item_quantity'] = (int)$jumlah_buku;
		Session::set('items', $items);
		Session::flash('notif','Jumlah Produk telah diubah menjadi '.$jumlah_buku);
		return Redirect::to('keranjang');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($index)
	{	
		$items = Session::get('items');
		unset($items[$index]);
		// Session::forget('items[$index]');
		Session::set('items', $items);
		Session::flash('notif','Buku Berhasil Di hapus');
		return Redirect::to('keranjang');
	}
	

}
