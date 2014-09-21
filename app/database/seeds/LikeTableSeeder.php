<?php

class likeTableSeeder extends Seeder {

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
			
			DB::table('likes')->insert(array(
					
					'pic_id' => $i,
					'user_name' => 'user_name' . $i,
				));
		}
	}

}