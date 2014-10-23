<?php

class PictureTableSeeder extends Seeder {

    public function run()
	{
		for($i = 1; $i < 60; ++$i)
		{
                                                               
			$time = time()+($i * 2 * 13 * 59 * 59);
			
                        if($i<55)
                            $box_id = 1;
                        else
                            $box_id = $i-54;
                        
			DB::table('pictures')->insert(array(
					
					'boxe_id' => $box_id,
					'Picture_url' => $i.'.jpg',
					'name' => 'Nom' . $i,
					'date' => $time,
					'wall' => true,
					'like' => $i,
					'comment' => $i,
                                        'legend' => 'text text text text text text text text text text text text text text text text '.$i,
				));
		}
	}
}