<?php

class BoxeTableSeeder extends Seeder {

    public function run()
	{
		for($i = 1; $i < 20; ++$i)
		{
                    
                if($i<3)
                    $user_id = 1;
                else
                    $user_id = $i;
		
			$time = time()-($i * 24 * 60 * 60);
			
			DB::table('boxes')->insert(array(
					
					'user_id' => $user_id,
					'name' => 'Nom' . $i,
					'country' => 'country' . $i,
                                        'city' => 'city' . $i,
					'battery' => 5*$i,
					'solar_panel' => 5*$i,
					'first_date' => $time,
					'version' => 'v1.0'
				));
		}
	}
}