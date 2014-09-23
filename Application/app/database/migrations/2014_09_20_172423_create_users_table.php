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
			$table->string('name', 30)->unique();
			$table->string('password', 20);
			$table->string('adress', 100);
			$table->string('city', 50);
			$table->string('country', 50);
			$table->string('account_type', 50);
			$table->integer('subscription_date')->unsigned(); //->unsigned() only positive values
			$table->integer('creation_date')->unsigned(); //format date timestamp UNIX => format : 428389200 
			$table->string('Languages_iso', 2); // fr, en, de, ... etc..
                        
                        
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
