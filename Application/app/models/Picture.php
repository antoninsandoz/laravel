<?php

class Picture extends Eloquent{

	public $timestamps = true;

	public function boxe() 
	{
		return $this->belongsTo('Boxe');
	}
        
        public function Picture() 
	{
		return $this->hasMany('Comment', 'Like');
	}

}