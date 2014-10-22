<?php 

namespace Lib\Validation;

class UserCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'email_new' => 'required|email|unique:users,email,id',
                        'username' => 'required|max:30|alpha_num|unique:users,username,id',
                        'Languages_iso' => 'required|in:en,de,fr',
                        'country' => 'required|in:Switzerland',
                        'sex' => 'required|in:women,men,unspecified',
			'password_new' => 'required|min:6|max:30|alpha_dash|same:password_new2',
		);
	}

}