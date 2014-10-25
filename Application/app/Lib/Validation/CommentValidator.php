<?php namespace Lib\Validation;

class CommentValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
//			'email' => 'required|exists:users'
		);
	}

}