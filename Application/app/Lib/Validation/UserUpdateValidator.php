<?php 

namespace Lib\Validation;

class UserUpdateValidator extends BaseValidator {

    public function __construct()
	{
            $this->regles = array(
                    'email' => 'required|email|unique:users,email,id',
                    'username' => 'required|max:30|alpha_num|unique:users,username,id',
                    'Languages_iso' => 'required|in:en,de,fr',
                    'country' => 'required|in:Switzerland',
                    'sex' => 'required|in:women,men,unspecified',
            );            
	}
}
