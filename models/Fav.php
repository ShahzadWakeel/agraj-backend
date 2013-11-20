<?php

use LaravelBook\Ardent\Ardent;


class Fav extends Ardent {

	protected $guarded = array();


	public function judge()
	{
		return $this->belongsTo("Judge");
	}

	public function story()
	{
		return $this->belongsTo("Story");
	}
}