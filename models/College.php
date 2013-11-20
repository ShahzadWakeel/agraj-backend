<?php

use LaravelBook\Ardent\Ardent;


class College extends Ardent {

	protected $guarded = array();
	public static $rules = array(
		"name" => "required",
		// "email_suffix" => "required|unique:colleges,email_suffix"
	);

	public function users()
	{
		return $this->hasMany("User");
	}
}