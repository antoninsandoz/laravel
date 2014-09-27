<?php

class Comment extends Eloquent{

	public $timestamps = true;

	public function picture() 
	{
		return $this->belongsTo('Picture');
	}

}