<?php

use LaravelBook\Ardent\Ardent;


class Allotment extends Ardent {

	protected $guarded = array();

	public function judge()
	{
		return $this->belongsTo("judge");
	}

	public function story()
	{
		return $this->belongsTo("Story");
	}
}