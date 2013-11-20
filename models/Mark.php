<?php

use LaravelBook\Ardent\Ardent;


class Mark extends Ardent {
	public static $rules = array(
		"marks" => "required"
	);
	protected $guarded = array();

	public function judge()
	{
		return $this->belongsTo("Judge");
	}

	public function content()
	{
		return $this->belongsTo("Content");
	}
}