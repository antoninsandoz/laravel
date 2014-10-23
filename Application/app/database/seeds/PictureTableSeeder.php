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
                        
                        //creat variation natural
                        if($i%3 == 0){
                            $like = 2;
                            $comment =0;
                            $legend = 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ';
                        }
                        elseif($i%4 == 0){
                            $like = 0;
                            $comment =2;
                            $legend = 'text text text text text text text text text text text text text text text';
                        }
                        elseif($i%5 == 0){
                            $like = 0;
                            $comment = 0;
                            $legend = 'text text text text text text text text text text text text text text text ext text text text text text text text text text text text text text text ext text text text text text text text text text text text text text text';
                        }
                        else{
                            $like = 3;
                            $comment =4;
                            $legend = 'text text text text text text';
                        }
                        
			DB::table('pictures')->insert(array(
					
					'boxe_id' => $box_id,
					'Picture_url' => $i.'.jpg',
					'name' => 'Nom' . $i,
					'date' => $time,
					'wall' => true,
					'like' => $like,
					'comment' => $comment,
                                        'legend' => $legend
				));
		}
	}
}