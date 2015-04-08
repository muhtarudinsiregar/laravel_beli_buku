<?php 
	/**
	* 
	*/
	class BooksTableSeeder extends Seeder
	{
		
		public function run()
		{
			Eloquent::unguard();
			// kosongin tabel books
			DB::table('books')->delete();

			// buat array untuk input data ke db

			$books = [
				['id'=>'1','title'=>'Koala Kumal', 'description'=>'Buku Terbaru Raditya Dika','price'=>'50000','publisher'=>'Gagas Media','author'=>'Raditya Dika','stock'=>'400','image'=>'12.jpeg','thumbnail'=>'12_thumb.jpeg'],
				['id'=>'2','title'=>'Seminggu Belajar Laravel', 'description'=>'Buku Wajib Bagi Pemula yang ingin belajar Laravel','price'=>'50000','publisher'=>'Leanpub','author'=>'Rahmat Awaludin','stock'=>'100','image'=>'121.jpeg','thumbnail'=>'121_thumb.jpeg'],
				['id'=>'3','title'=>'Framework Codeigniter ', 'description'=>'Buku Wajib bagi Pemula yang ingin belajar Codeigniter','price'=>'50000','publisher'=>'Informatika','author'=>'Betha Sidik','stock'=>'140','image'=>'122.jpeg','thumbnail'=>'122_thumb.jpeg']
			
			];

			// insert ke db

			DB::table('books')->insert($books);


		}
	}
 ?>789