<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buku', function(Blueprint $table){
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('price');
			$table->string('publisher');
			$table->string('author');
			$table->string('stock');
			$table->string('image');
			$table->string('thumbnail');
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buku');
	}

}
