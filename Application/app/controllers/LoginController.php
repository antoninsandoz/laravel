<?php

use Lib\Validation\LoginValidator as LoginValidator;

class LoginController extends BaseController{

    protected $login_validation;

    public function __construct(LoginValidator $login_validation)
    {
            parent::__construct();
            $this->login_validation = $login_validation;
    }

    public function getLogin()
    {       
            if (Auth::check())
            {
                return Redirect::to('user')->with('ok', 'You are alredy logged!');
            }
            else
                return View::make('login');
            
    }

    public function postLogin()
    {
            if ($this->login_validation->fails()) {
              return Redirect::to('login')
              ->withErrors($this->login_validation->errors())
              ->withInput();
            } 
            else {
                if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')),true)) {
                    return Redirect::to('user')->with('ok', 'You are now logged in!');
                }
                else{
                    return Redirect::to('login')
                    ->with('pass', 'Le mot de passe n\'est pas correct !')
                    ->withInput();
                }
            }
    }

    public function getLogout()
    {
            Auth::logout();
            return Redirect::to('login');
    }

}