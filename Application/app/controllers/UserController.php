<?php

use Lib\Validation\UserCreateValidator as UserCreateValidator;
use Lib\Validation\UserUpdateValidator as UserUpdateValidator;
use Lib\Validation\UserPassUpdateValidator as UserPassUpdateValidator;
use Lib\Gestion\UserGestion as UserGestion;

class UserController extends BaseController {

        protected $create_validation;
	protected $update_validation;
        protected $pass_update_validation;
	protected $user_gestion;

	public function __construct(
		UserCreateValidator $create_validation, 
		UserUpdateValidator $update_validation,
                UserPassUpdateValidator $pass_update_validation,
		UserGestion $user_gestion
		)
	{
		parent::__construct();
                //$this->beforeFilter('auth'); //filtre authentification
		$this->create_validation = $create_validation;
		$this->update_validation = $update_validation;
                $this->pass_update_validation = $pass_update_validation;
		$this->user_gestion = $user_gestion;
	}
        
        //one user store on DataBase
	public function store()
	{   
            //check validation before store on DataBase
            if ($this->create_validation->fails()) {
		  return Redirect::to('login')
                  ->with('error','Errors in fields, please correct it')        
		  ->withInput()
		  ->withErrors($this->create_validation->errors());
		} else {
			$this->user_gestion->store();
//			return Redirect::to('login')
//			->with('ok','Thank you for registering');
                        $email = Input::get('email_new');
                        $password = Input::get('password_new');
                        Auth::attempt(array('email' => $email, 'password' => $password));
                        return Redirect::to('login')
                        ->with('ok','Thank you for registering');
		}		
	}
        
        //one user display     
	public function show()
	{       
            if (Auth::check())
            {
                $id = Auth::id();
                return View::make('UserShow',  $this->user_gestion->show($id));
            }
            else
                return Redirect::to('login')
                ->with('error','Please login');
            
	}
        
        //Password edit !
        public function password()
        {
            if (Auth::check())
            {
                $id = Auth::id();
                return View::make('UserPassword',  $this->user_gestion->show($id));
            }
            else
                return View::make('login');
            

        }
        
        //one user update
	public function update()
	{   
            if (Auth::check())
            {    
                $id = Auth::id();
                if(Input::get('password')){
                    if(Input::get('password2') != Input::get('password')){
                        return Redirect::action('UserController@password')
                        ->withInput()
                        ->with('error','Erreurs : Passwords are not the same');
                    }
                    else{

                        if ($this->pass_update_validation->fails($id)) {
                        return Redirect::action('UserController@password')
                        ->withInput()
                        ->with('error','Erreurs')
                        ->withErrors($this->pass_update_validation->errors());
                        } 
                        else {
                                $this->user_gestion->update_password($id);
                                return Redirect::to('user')
                                ->with('ok','Password modified');
                        }
                    }
                }
                else{
                    if ($this->update_validation->fails($id)) {
                      return Redirect::to('user')
                      ->withInput()
                      ->with('error','Erreurs the fields are not correct')
                      ->withErrors($this->update_validation->errors());

                    } else {
                            $this->user_gestion->update($id);
                            return Redirect::to('user')
                            ->with('ok','User modified.');
                    }
                }
            }
            else
                return View::make('login');
	}

	public function destroy($id)
	{
		$this->user_gestion->destroy($id);
		return Redirect::back();
	}

}