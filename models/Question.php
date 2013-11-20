<?php

use LaravelBook\Ardent\Ardent;


class Question extends Ardent {
	protected $guarded = array();
	public static $rules = array(
		"question" => "required",
		"hint" => "required",
		"order" => "required"
	);

	public function section() {
		return $this->belongsTo("Section");
	}

	public function contents(){
		return $this->hasMany("Content");
	}
}