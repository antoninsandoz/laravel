<?php

use Lib\Gestion\WallGestion as WallGestion;

class WallController extends BaseController {

	protected $wall_gestion;

	public function __construct(
		WallGestion $wall_gestion
		)
	{
		parent::__construct(); 
		$this->wall_gestion = $wall_gestion;
	}

        //public wall display  
	public function index($id, $pagination)
	{       
            //for chck if can add likes
            if (Auth::check())
                $auth = 1;
            else
                $auth = 0;
            
            return View::make('WallIndex',  $this->wall_gestion->index($id, $pagination, $auth));
	}
        
        //public wall display  
	public function show($id_p)
	{
		return View::make('WallShow',  $this->wall_gestion->show($id_p));
	}

}