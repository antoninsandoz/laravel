<?php namespace Lib\Validation;

class CommentValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
        		'comment' => 'required|max:1000'
		);
	}

}