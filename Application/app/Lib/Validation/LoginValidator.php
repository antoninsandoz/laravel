<?php namespace Lib\Validation;

class LoginValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'email' => 'required|exists:users'
		);
	}

}