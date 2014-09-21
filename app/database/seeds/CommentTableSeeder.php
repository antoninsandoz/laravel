<?php

class CommentTableSeeder extends Seeder {

    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for($i = 1; $i < 20; ++$i)
		{
		
			$time = time()-($i * 24 * 60 * 60);
			
			DB::table('comments')->insert(array(
					
					'pic_id' => $i,
					'comment' => 'comment text text text text text text text text text' . $i,
					'date' => $time,
					'user_name' => 'user_name' . $i,
					'Languages_iso' => 'fr'
				));
		}
	}

}