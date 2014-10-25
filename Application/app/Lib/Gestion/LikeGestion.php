<?php namespace Lib\Gestion;

use Like;
use User;
use Picture;

class LikeGestion implements LikeGestionInterface {

    public function add($id, $id_p)
    {
        
        $likeexist = Like::where('user_id', '=', $id)->where('pic_id', '=', $id_p)->first(); 
        
        if(!isset($likeexist->id)){
            $like = new Like;
            $like->pic_id = $id_p;

            $user = User::find($id);
            $like->user_id = $user->id;   
            $like->user_name = $user->username;     
            $like->save();

            $picture = Picture::find($id_p);
            $nblike = $picture->like; 
            $picture->like = $nblike+1;
            $picture->save();

            return compact('like');
        }
        else{
            $like = false;
            return compact('like');
        }
            

    }
    
        public function remove($id, $id_p)
        {
            
            $like = Like::where('user_id', '=', $id)->where('pic_id', '=', $id_p)->delete();         
            $picture = Picture::find($id_p);
            $nblike = $picture->like; 
            $picture->like = $nblike-1;
            $picture->save();

            return compact('like');

        }
    
    
    
}