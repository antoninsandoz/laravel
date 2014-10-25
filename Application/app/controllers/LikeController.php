<?php

use Lib\Gestion\LikeGestion as LikeGestion;

class LikeController extends BaseController {
        
        protected $like_gestion;
        
	public function __construct(LikeGestion $like_gestion)
	{
		parent::__construct();
                //Check if ajax request
		//$this->beforeFilter('ajax');
                $this->like_gestion = $like_gestion;
                
	}

	public function add($id_p)
	{   
            if (Auth::check())
            {
                $id = Auth::id();
                return Response::json($this->like_gestion->add($id, $id_p));
            }
            else{
                return Redirect::to('login');
            }
	}
        
        public function remove($id_p)
	{   
            if (Auth::check())
            {
                $id = Auth::id();
                return Response::json($this->like_gestion->remove($id, $id_p));
            }
            else{
                return Redirect::to('login');
            }           
	}

	

}