<?php namespace Lib\Gestion;

use User;
use Input;
use Comment;

class CommentGestion implements CommentGestionInterface {

    public function add($id, $id_p)
    {
        $comment = new Comment;
        $comment->comment = Input::get('comment');
        //$comment->comment = 'test';
        $comment->pic_id = $id_p;
        
        $user = User::find($id);
        $comment->user_id = $user->id;
        $comment->user_name = $user->username;
        $comment->image = $user->image;
        $comment->Languages_iso	= $user->Languages_iso;
        
        $comment->date = time();
        
        $comment->save();
    }
    
    public function belongs($id, $id_c){
        
        $comment = Comment::find($id_c);
        //Check if comment belongs to the actual user
        $userid = $comment->user_id;
        if($userid == $id)
            return true;        
        else
            return false;
        
    }
    
    public function remove($id_c)
    {
        //delete comment
        Comment::find($id_c)->delete();

    }
    
    
    
}