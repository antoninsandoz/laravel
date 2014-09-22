<?php

class PictureTableSeeder extends Seeder {

    public function run()
	{
		for($i = 1; $i < 20; ++$i)
		{
		
			$time = time()-($i * 24 * 60 * 60);
			
			DB::table('pictures')->insert(array(
					
					'box_id' => $i,
					'Picture_url' => $i.'.jpg',
					'name' => 'Nom' . $i,
					'date' => $time,
					'wall' => true,
					'like' => $i,
					'comment' => $i,

				));
		}
	}
}