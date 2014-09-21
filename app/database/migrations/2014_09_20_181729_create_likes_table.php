<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//creat colomn database table
		Schema::create('likes', function($table) {
			$table->increments('id');
			$table->integer('pic_id')->unsigned(); //->unsigned() only positive values
			$table->string('user_name', 30);
		});
	
		//create relation
		Schema::table('likes', function(Blueprint $table) {
			$table->foreign('pic_id')->references('id')->on('pictures')
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
		Schema::drop('likes'); // delete table users
	}

}
