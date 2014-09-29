<?php namespace Lib\Gestion;

use User;
use Boxe;
use Picture;
use Input;
use Hash;

class WallGestion implements WallGestionInterface {

	public function show($id)
	{       
                $user = User::find($id);
		$boxes = User::find($id)->boxes;
                
                //All pictures from all boxs
                foreach ($boxes as $key => $box) {
                    
                    $box_id = $box->id;
                    //find picture foreach boxes
                    $pictures[$box_id] = Boxe::find($box_id)->pictures;
                    //creat new object with all pictures of all boxs
                    $user_likes = 0;
                    $user_comments = 0;
                    $n=0;
                    foreach ($pictures as $picture) {  
                        foreach ($picture as $pict) {
                            $n++;
                            $allpictures[$n] = $pict;

                            //Count all user likes
                            if($pict->like >0)
                                $user_likes = $pict->like + $user_likes;
                            //Count all user comments
                            if($pict->like >0)
                                $user_comments = $pict->comment + $user_comments;
                            //Count all pictures
                            $user_pictures = $n;
                        }
                    }
                }
                
                //Short the table depending on date (the most rencent first)
                $allpictures = array_values(array_reverse(array_sort($allpictures, function($value)
                {
                    return $value['date'];
                })));
                            
                            

                return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures');
                
	}
        
        public function adminshow($id)
	{       
                $user = Boxe::find($id);
		$boxes = User::find($id)->boxes;
                
                //All pictures from all boxs
                foreach ($boxes as $key => $box) {
                    
                    $box_id = $box->id;
                    //find picture foreach boxes
                    $pictures[$box_id] = Boxe::find($box_id)->pictures;
                    //creat new object with all pictures of all boxs
                    $user_likes = 0;
                    $user_comments = 0;
                    $n=0;
                    foreach ($pictures as $picture) {  
                        foreach ($picture as $pict) {
                            $n++;
                            $allpictures[$n] = $pict;

                            //Count all user likes
                            if($pict->like >0)
                                $user_likes = $pict->like + $user_likes;
                            //Count all user comments
                            if($pict->like >0)
                                $user_comments = $pict->comment + $user_comments;
                            //Count all pictures
                            $user_pictures = $n;
                        }
                    }
                }
                
                //Short the table depending on date (the most rencent first)
                $allpictures = array_values(array_reverse(array_sort($allpictures, function($value)
                {
                    return $value['date'];
                })));
                            
                            

                return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures');
                
	}

}