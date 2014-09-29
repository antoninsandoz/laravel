<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boxes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned(); //->unsigned() only positive values
			$table->string('key', 30);
			$table->string('name', 30);
			$table->string('country', 50);
                        $table->string('city', 50);
			$table->integer('battery')->unsigned(); //->unsigned() only positive values
			$table->integer('solar_panel')->unsigned(); //->unsigned() only positive values
			$table->integer('first_date')->unsigned(); //format date timestamp UNIX => format : 428389200 
			$table->string('version', 30); 
		});
		
		//create relation
		Schema::table('boxes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
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
		Schema::drop('boxes'); // delete table users
	}

}
