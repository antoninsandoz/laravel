<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('BoxeTableSeeder');
		$this->call('PictureTableSeeder');
		$this->call('CommentTableSeeder');
		$this->call('LikeTableSeeder');
	}

}
