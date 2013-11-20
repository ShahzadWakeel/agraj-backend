<?php

use LaravelBook\Ardent\Ardent;


class Story extends Ardent {

	public $table = "stories";
	protected $guarded = array();

	public static $rules = array(
		"title" => "required"
	);

	public function user()
	{
		return $this->belongsTo("User");
	}

	public function ratings()
	{
		return $this->hasMany("Rating");
	}

	public function contents()
	{
		return $this->hasMany("Content");
	}
}