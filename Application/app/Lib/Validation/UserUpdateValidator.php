<?php 

namespace Lib\Validation;

class UserUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			
                        //'name' => 'required|max:30|alpha|unique:users,name,id',
			//'email' => 'required|email|unique:users,email,id',
                        'username' => 'required|max:30|alpha_num|unique:users,username,id'
		);
	}

}