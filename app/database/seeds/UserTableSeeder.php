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
		}
		
	}
 ?>