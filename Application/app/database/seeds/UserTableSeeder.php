<?php

class UserTableSeeder extends Seeder {

    public function run()
	{
		for($i = 1; $i < 20; ++$i)
		{
		
			$time = time()+ $i;
			$time2 = time()-($i * 24 * 60 * 60);
			
			DB::table('users')->insert(array(
					
					'email' => 'email' . $i . '@test.test',
                                        'username' => 'UserName' . $i,
                                        'image' =>  $i.'.jpg',
					'password' => Hash::make('password' . $i),
					'city' => 'city' . $i,
					'country' => 'country' . $i,
                                        'sex' => 'men',
					'Languages_iso' => 'fr'
                                        
				));
		}
	}
}