<?php

class Boxe extends Eloquent{

    
	
	public $timestamps = true;

	public function user() 
	{
		return $this->belongsTo('User');
	}
        
        public function pictures() 
	{
		return $this->hasMany('Picture');
	}
        
}
