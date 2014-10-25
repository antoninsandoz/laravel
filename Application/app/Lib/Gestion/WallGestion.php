<?php namespace Lib\Gestion;

use User;
use Boxe;
use Like;
use Picture;
use Input;
use Hash;

class WallGestion implements WallGestionInterface {

    public function index($id, $pagination)
    {     
            //Number of image in a page
            $number_of_block = 16;
            $user = User::find($id);
            $boxes = User::find($id)->boxes;

            $user_pictures = 0;    
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

                if($user_pictures >0){
                    //Short the table depending on date (the most rencent first)
                    $allpictures = array_values(array_reverse(array_sort($allpictures, function($value)
                    {
                        return $value['date'];
                    })));

                    //cut table picutre in function of pagination
                    $offset = $number_of_block*($pagination-1);
                    $lenght = $number_of_block*$pagination;
                    $allpictures = array_slice($allpictures, $offset, $lenght);

                    //calculate nb of page
                    $nbofpage = ceil($n/$number_of_block);

                    return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures', 'pagination', 'nbofpage');
                }
                else{
                    $allpictures = false;
                    return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures');

                }


    }
    
    public function show($id_p)
    {     

            $picture = Picture::find($id_p);
            $boxeid = $picture->boxe_id;
            $user = Boxe::find($boxeid)->user;
            $pictures = Boxe::find($boxeid)->pictures->take(8);
            
            $like = Like::where('user_id', '=', $user->id)->where('pic_id', '=', $id_p)->first();
            
            if(isset($like->id))
                $thereisalike = true;
            else
                $thereisalike = false;
            

            return compact('picture', 'boxeid', 'pictures', 'user', 'thereisalike');

    }
        
}