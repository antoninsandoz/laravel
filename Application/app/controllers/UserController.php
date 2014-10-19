<?php

use Lib\Validation\UserCreateValidator as UserCreateValidator;
use Lib\Validation\UserUpdateValidator as UserUpdateValidator;
use Lib\Gestion\UserGestion as UserGestion;

class UserController extends BaseController {

        protected $create_validation;
	protected $update_validation;
	protected $user_gestion;

	public function __construct(
		UserCreateValidator $create_validation, 
		UserUpdateValidator $update_validation,
		UserGestion $user_gestion
		)
	{
		parent::__construct();
		$this->create_validation = $create_validation;
		$this->update_validation = $update_validation;
		$this->user_gestion = $user_gestion;
	}
        //user list
        //IF ADMIN
        /*Not use
	public function index()
	{
		return View::make('UserIndex', $this->user_gestion->index(4));
	}
        */
        //one user form of creation
	public function create()
	{
		return View::make('UserCreate');
	}
        
        //one user store on DataBase
	public function store()
	{
            //check validation before store on DataBase
            if ($this->create_validation->fails()) {
		  return Redirect::route('user.create')
		  ->withInput()
		  ->withErrors($this->create_validation->errors());
		} else {
			$this->user_gestion->store();
			return Redirect::route('user.index')
			->with('ok','L\'utilisateur a bien été créé.');
		}		
	}
        
        //one user display     
	public function show($id)
	{
		return View::make('UserShow',  $this->user_gestion->show($id));
	}
        
        //one user edit
        /*Not use
        public function edit($id)
            {
                    return View::make('UserEdit',  $this->user_gestion->edit($id));
            }
        */
        //one user update
	public function update($id)
	{
		if ($this->update_validation->fails($id)) {
		  return Redirect::route('user.show', array($id))
		  ->withInput()
                  ->with('ok','Erreurs')
		  ->withErrors($this->update_validation->errors());
                  
		} else {
			$this->user_gestion->update($id);
			return Redirect::route('user.show', array($id))
			->with('ok','Utilisateur modifié.');
		}		
	}

	public function destroy($id)
	{
		$this->user_gestion->destroy($id);
		return Redirect::back();
	}

}