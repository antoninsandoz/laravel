<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table) {
			$table->increments('id');
			$table->integer('pic_id')->unsigned(); //->unsigned() only positive values
			$table->string('comment', 500);
			$table->integer('date')->unsigned(); //format date timestamp UNIX => format : 428389200 
			$table->string('user_name', 30);
			$table->string('Languages_iso', 2); // fr, en, de, ... etc..
		});
		
		//create relation
		Schema::table('comments', function(Blueprint $table) {
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
		Schema::drop('comments'); // delete table users
	}

}
