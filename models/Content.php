<?php

use LaravelBook\Ardent\Ardent;


class Content extends Ardent {

	protected $guarded = array();
	public static $rules = array(
		"content" => "required"
	);

	public function story(){
		return $this->belongsTo("Story");
	}

	public function question(){
		return $this->belongsTo("Question");
	}

	public function marks() {
		return $this->hasMany("Mark");
	}
}