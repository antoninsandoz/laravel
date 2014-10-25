<?php

use Lib\Validation\AdminWallValidator as AdminWallValidator;
use Lib\Gestion\AdminWallGestion as AdminWallGestion;

class AdminWallController extends BaseController {

    protected $admin_wall_validation;
    protected $admin_wall_gestion;

    public function __construct(
            AdminWallValidator $admin_wall_validation, 
            AdminWallGestion $admin_wall_gestion
            )
    {
            parent::__construct(); 
            $this->admin_wall_validation = $admin_wall_validation;
            $this->admin_wall_gestion = $admin_wall_gestion;
    }
    //Admin wall display 
    public function adminindex($id_b)
    {   
        
        if (Auth::check())
        {
            $id = Auth::id();
            //check if box belongs to user
            $boxcheck = $this->admin_wall_gestion->boxcheck($id, $id_b);
            if ($boxcheck)
                return View::make('AdminWallIndex',  $this->admin_wall_gestion->adminindex($id_b));
            else
                return Redirect::to('pagenotfound');
        }
        else
            return Redirect::to('login')->with('error','Please login');
    }

}