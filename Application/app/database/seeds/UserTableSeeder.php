<?php

class UserTableSeeder extends Seeder {

    public function run()
	{
		for($i = 1; $i < 20; ++$i)
		{
		
//			$time = time()+ $i;
//			$time2 = time()-($i * 24 * 60 * 60);
			
			DB::table('users')->insert(array(
					
					'email' => 'antoninsandoz' . $i . '@posteo.de',
                                        'username' => 'Antonin' . $i,
                                        'image' =>  '', //empty !!
					'password' => Hash::make('1234'),
					'country' => 'Switzerland',
                                        'sex' => 'men',
					'Languages_iso' => 'fr'
                                        
				));
		}
	}
}