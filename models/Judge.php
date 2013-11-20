<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Authj\UserInterface;
use Illuminate\Authj\Reminders\RemindableInterface;

class Judge extends Ardent implements UserInterface, RemindableInterface {

	protected $guarded = array();

	public static $rules = array(
		"name" => "required",
		"email" => "required|email|unique:judges",
		"password" => "required",

		"hostel" => "",

		"department" => "",
		"iit_year" => "",

		"city_state" => "",

		"career" => "",
		"views" => "",
		"social_link" => "",
	);

	public function college() {
		return $this->belongsTo("College");
	}

	public function beforeSave($forced = false) {
		if($this->getOriginal('password', FALSE) !== $this->password) $this->password = Hash::make($this->password);
		return true;
	}

	public function allotments() {
		return $this->belongsToMany("Story", "allotments");
	}

	public function favs() {
		return $this->belongsToMany("Story", "favs");
	}

	public function marks() {
		return $this->hasMany("Mark");
	}

	public function ratings() {
		return $this->hasMany("Rating");
	}

	public function getUrlID() {
		$pieces = explode("@", $this->email);
		return urlencode($this->id."-".$pieces[0]);
	}

	public static function findByUrlID($url_id) {
		$u = self::where("id","=",intval($url_id))->first();
		return ($u && $u->getUrlID() == $url_id) ? $u : FALSE;
	}

	public function picture() {
		$fileName = "/img/profiles/judges/".$this->id;
			$str = '<img src="'.$fileName.'" alt="'.$this->name.'">';
		
		return $str;
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'judges';

	public $autoPurgeRedundantAttributes = true;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthjIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthjPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}