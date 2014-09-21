<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('box_id')->unsigned(); //->unsigned() only positive values
			$table->string('Picture_url', 100);
			$table->string('name', 30);
			$table->integer('date')->unsigned(); //format date timestamp UNIX => format : 428389200 
			$table->boolean('wall')->default(false);
			$table->integer('like')->unsigned(); //->unsigned() only positive values
			$table->integer('comment')->unsigned(); //->unsigned() only positive values 
		});
		
		//create relation
		Schema::table('pictures', function(Blueprint $table) {
			$table->foreign('box_id')->references('id')->on('boxes')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pictures'); // delete table users
	}

}
