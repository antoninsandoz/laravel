<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email', 100)->unique(); //unique e mail for table
                        $table->string('username', 30)->unique();
                        $table->string('password', 200);
                        $table->string('image', 30);
			$table->string('country', 50);
                        $table->string('sex', 50);
			$table->string('Languages_iso', 2); // fr, en, de, ... etc..
                        $table->string('remember_token',100); // for user authentificaton !!
                        
		});
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users'); // delete table users
	}

}
