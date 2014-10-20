<?php 

namespace Lib\Validation;

class UserPassUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
                        'password' => 'required|min:6|max:30|alpha_dash',
                        'password2' => 'required|min:6|max:30|alpha_dash'
		);
	}

}