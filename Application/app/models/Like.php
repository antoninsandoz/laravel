<?php

class Like extends Eloquent{

	public $timestamps = false;

	public function picture() 
	{
		return $this->belongsTo('Picture');
	}

}