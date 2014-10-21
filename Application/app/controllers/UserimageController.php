<?php

use Lib\Validation\imageValidator as imageValidator;
use Lib\Gestion\imageGestion as imageGestion;

class UserimageController extends BaseController {

    protected $imagegestion;

	public function __construct(imageValidator $validation, imageGestion $imagegestion)
	{
            parent::__construct();
            $this->validation = $validation;
            $this->imagegestion = $imagegestion;
	}

	public function getForm()
	{   
            if (Auth::check())
            {   
                $id = Auth::id();
                return View::make('userimage',  $this->imagegestion->show($id));
            }
            else
                return View::make('login');
	}

	public function postForm()
	{
            if (Auth::check())
            { 
                $id = Auth::id();
                if ($this->validation->fails()) {
                    return Redirect::to('userimage')
                    ->withErrors($this->validation->errors());
                } 
                else {
                    if($this->imagegestion->save(Input::file('image'), $id)) {
                                return Redirect::to('user')
                                ->with('ok','image uploaded !');
                        } 
                        else {
                                return Redirect::to('userimage')
                                ->with('error','Désolé mais votre image ne peut pas être envoyée !');
                        }
                }
            }
            else
                return View::make('login');
	}

}