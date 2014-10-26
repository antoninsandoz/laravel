<?php

use Lib\Validation\CommentValidator as CommentValidator;
use Lib\Gestion\CommentGestion as CommentGestion;

class CommentController extends BaseController {

        protected $comment_validation;
	protected $comment_gestion;

	public function __construct(
		CommentValidator $comment_validation, 
		CommentGestion $comment_gestion
		)
	{
		parent::__construct();
                //$this->beforeFilter('auth'); //filtre authentification
		$this->comment_validation = $comment_validation;
		$this->comment_gestion = $comment_gestion;
	}
        
        
	public function add($id_p)
	{   
            if (Auth::check())
            {
                if ($this->comment_validation->fails()) {
                    return Redirect::to('bird/'.$id_p)
                    ->withInput()
                    ->with('error','Comment erreurs : Please respect : Max 1000 letters')
                    ->withErrors($this->comment_validation->errors());
                } 
                else{
                    $id = Auth::id();
                    $this->comment_gestion->add($id, $id_p);
                    return Redirect::to('bird/'.$id_p);
                }
            }
            else
                return Redirect::to('login')
                ->with('error','Please login');
           		
	}
        
        public function remove($id_c)
	{   
           if (Auth::check())
            {
                $id = Auth::id();
                $belongstouser = $this->comment_gestion->belongs($id, $id_c);
                
                if($belongstouser){
                    $belongstouser = $this->comment_gestion->remove($id_c);
                }
                else{
                    return Redirect::to('bird/'.$id_p)
                        ->with('error',"You can't delete this comment");
                }
            }
            else
                return Redirect::to('login')
                ->with('error','Please login'); 
           		
	}

}