<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent implements UserInterface, RemindableInterface {
	public static $rules = array(
		"name" => "required",
		"email" => "required|email|unique:users",
		"password" => "required|confirmed",
		'password_confirmation' => 'required',
		"gender" => "",
		"iit_year" => "integer",
		"year" => "",
		"department" => "",
		"college_email" => "required|email|unique:users",
		"city_state" => "",
		"jee_city_state" => "",

		"jee_air" => "",
		"jee_repeat" => "",

		"social_link" => ""

	);

	protected $guarded = array();

	public function beforeSave($forced = false) {
		if($this->getOriginal('password', FALSE) !== $this->password) $this->password = Hash::make($this->password);
		return true;
	}

	public function scopeConfirmed($query)
	{
		$query->where("confirmed_flag", 1);
	}

	public function story() {
		return $this->hasOne("Story");
	}

	public function college()
	{
		return $this->belongsTo("College");
	}

	public function getUrlID() {
		$pieces = explode("@", $this->college_email);
		return urlencode($this->id."-".$pieces[0]);
	}

	public static function findByUrlID($url_id) {
		$u = self::confirmed()->where("id","=",intval($url_id))->first();
		return ($u && $u->getUrlID() == $url_id) ? $u : FALSE;
	}

	public function picture() {
		$fileName = "/img/profiles/users/".$this->id;
			$str = '<img src="'.$fileName.'" alt="'.$this->name.'">';
		
		return $str;
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	public $autoPurgeRedundantAttributes = true;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
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