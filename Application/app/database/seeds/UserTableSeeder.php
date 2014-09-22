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
					'name' => 'Nom' . $i,
					'password' => Hash::make('password' . $i),
					'adress' => 'adress' . $i,
					'city' => 'city' . $i,
					'country' => 'country' . $i,
					'account_type' => 'free',
					'subscription_date' => $time,
					'creation_date' => $time2,
					'Languages_iso' => 'fr'
				));
		}
	}
}