<?php

class Picture extends Eloquent{

	public $timestamps = false;

	public function boxe() 
	{
		return $this->belongsTo('Boxe');
	}
        
        public function Picture() 
	{
		return $this->hasMany('Comment', 'Like');
	}

}