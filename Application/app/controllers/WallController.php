<?php

use Lib\Validation\WallValidator as WallValidator;
use Lib\Gestion\WallGestion as WallGestion;

class WallController extends BaseController {

        protected $wall_validation;
	protected $wall_gestion;

	public function __construct(
		WallValidator $wall_validation, 
		WallGestion $wall_gestion
		)
	{
		parent::__construct(); 
		$this->wall_validation = $wall_validation;
		$this->wall_gestion = $wall_gestion;
	}

        //public wall display  
	public function show($id)
	{
		return View::make('WallShow',  $this->wall_gestion->show($id));
	}
        
        //public wall display if logged
	public function showlogged()
	{  
            if (Auth::check())
            {
                $id = Auth::id();
                return View::make('WallShow',  $this->wall_gestion->show($id));
            }
            else
                return Redirect::to('login')
                ->with('error','Please login');
	}
        
        //Admin wall display 
	public function adminshow()
	{   
            if (Auth::check())
            {
                $id = Auth::id();
                return View::make('WallAdminShow',  $this->wall_gestion->adminshow($id_b));
            }
            else
                return Redirect::to('login')
                ->with('error','Please login');
	}

}