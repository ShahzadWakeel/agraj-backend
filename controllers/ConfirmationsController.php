<?php

/**
* 	Confirmations of Registrations
*/
class ConfirmationsController extends BaseController
{
	
	public function action_new($token) {
		$user = User::where("email", "=", base64_decode($token))->first();

		if(!$user) {
			return Redirect::to("/")->with("error", "Invalid Link");
		}
		else {
			return $this->render("confirmations.new", "Confirm Registration", array("email" => $user->email));
		}
	}

	public function action_create() {
		$user = User::where("email", "=", Input::get("email"))->first();

		$part_1 = substr(md5($user->name.$user->jee_air), -4);
		$part_2 = substr(md5($user->name.$user->email), -4);

		if($part_1 == Input::get("part_1" ) && $part_2 == Input::get("part_2")){
			$user->confirmed_flag = "1";
			if($user->update(array("confirmed_flag" => "1"))){
				return Redirect::to("/")->with("success", "Registration confirmed. You may login now.");
			}
		}
		else{
			return Redirect::to("/")->with("error", "Invalid Codes");
		}
	}
}