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
        
        
	public function add($id_P)
	{   
            $data = $_POST['test'];
            return $test;
           		
	}
        
        public function update()
	{   
            
           		
	}
        
        public function remove()
	{   
            
           		
	}

}