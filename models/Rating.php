<?php

use LaravelBook\Ardent\Ardent;


class Rating extends Ardent {
	protected $guarded = array();
	
	public static $rules = array(
		"rating" => "required"
	);

	public function judge()
	{
		return $this->belongsTo("Judge");
	}

	public function story()
	{
		return $this->belongsTo("Story");
	}

}