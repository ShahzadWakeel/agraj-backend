<?php

use LaravelBook\Ardent\Ardent;

class Section extends Ardent {

	protected $guarded = array();

	public function questions() {
		return $this->hasMany("Question");
	}

}