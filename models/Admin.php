<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Autha\UserInterface;
use Illuminate\Autha\Reminders\RemindableInterface;

class Admin extends Ardent implements UserInterface, RemindableInterface {

	protected $guarded = array();

	public static $rules = array(
		"name" => "required",
		"email" => "required|email|unique:admins",
		"password" => "required"
	);

	public function beforeSave($forced = false) {
		if($this->getOriginal('password', FALSE) !== $this->password) $this->password = Hash::make($this->password);
		return true;
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admins';

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
	public function getAuthaIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthaPassword()
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