<?php

class Like extends Eloquent{

	public $timestamps = true;

	public function picture() 
	{
		return $this->belongsTo('Picture');
	}

}