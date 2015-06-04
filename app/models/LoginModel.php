<?php 
	/**
	* 
	*/
	class LoginModel
	{
		public function simpan($data_input)
		{
			DB::table('users')->insert($data_input);
		}
		
	}
 ?>