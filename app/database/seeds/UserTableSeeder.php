<?php 
	/**
	* 
	*/
	class UserTableSeeder extends Seeder
	{
		public function run()
		{
			DB::table('users')->delete();
			User::create(array(
					'nama'=>'admin',
					'email'=>'admin@admin.com',
					'password'=>Hash::make('admin'),
					'no_hp'=>123456789
				));
			User::create(array(
					'nama'=>'anggota',
					'email'=>'anggota@anggota.com',
					'password'=>Hash::make('anggota'),
					'no_hp'=>123456789
				));
		}
		
	}
 ?>