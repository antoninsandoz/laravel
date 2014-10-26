<?php namespace Lib\Gestion;

use User;
use Boxe;
use Like;
use Picture;
use Comment;

class WallGestion implements WallGestionInterface {

    public function index($id, $pagination, $auth)
    {     
        //Number of image in a page
        $number_of_block = 16;
        $user = User::find($id);
        $boxes = User::find($id)->boxes;

        $user_pictures = 0;  

        //likes form actual user
        $likes = Like::where('user_id', '=', $id)->select(array('pic_id'))->get();

        //creat new tab more simple
        $m=0;
        foreach ($likes as $key => $like) {
            $like_tab[$key] = 'like_id'.$like['pic_id'];
            $m=$key+1;
        }
        
        if($m==0)
           $like_tab[0]=false;     
        
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

            return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures', 'pagination', 'nbofpage', 'like_tab', 'auth');
        }
        else{
            $allpictures = false;
            return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures', 'auth');

        }


    }
    
    public function show($id_p)
    {     

            $picture = Picture::find($id_p);
            $boxeid = $picture->boxe_id;
            $user = Boxe::find($boxeid)->user;
            
            //8 first pictures for display on the page
            $pictures = Boxe::find($boxeid)->pictures->take(8);
            
            //check if user alredy like
            //like for this picture and this user
            $like = Like::where('user_id', '=', $user->id)->where('pic_id', '=', $id_p)->first();
            
            if(isset($like->id))
                $thereisalike = true;
            else
                $thereisalike = false;
            
            //comment for this picutre
            $comments = Comment::where('pic_id', '=', $id_p)->get();

            return compact('picture', 'boxeid', 'pictures', 'user', 'thereisalike', 'comments');

    }
        
}