<?php 

namespace Lib\Validation;

class imageValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array( 'image' => 'required|image' );
	}

}