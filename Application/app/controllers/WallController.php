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
		return View::make('WallIndex',  $this->wall_gestion->index($id, $pagination));
	}
        
        //public wall display  
	public function show($id_p)
	{
		return View::make('WallShow',  $this->wall_gestion->show($id_p));
	}

}