<?php

/**
* Sessions Controller
*/
class SessionsController extends BaseController {

	public $template = "layouts.application";

	public function action_new() {
		if(Auth::user() || Authj::user() || Autha::user()){
			try {
				return Redirect::back();
			} catch (Exception $e) {
				Auth::logout();
				Authj::logout();
				Autha::logout();
			}
		}

		return $this->render("sessions.new");
	}


	public function action_create() {
		$userdata = array(
			"email" => Input::get("email"),
			"password" => Input::get("password")
		);


		if(Auth::attempt(array_merge($userdata, array("confirmed_flag" => "1", "banned_flag" => False)), true)){
			return Redirect::to("/home");
		}
		elseif(Authj::attempt($userdata, array("banned_flag" => False), true)){
			return Redirect::to("/judge");
		}
		elseif(Autha::attempt($userdata)){
			return Redirect::to("/admin");
		}
		else{
			return Redirect::to("/login")->with("error", "Invalid Email or Password");
		}
	}


	public function action_destroy() {
		Auth::logout();
		Authj::logout();
		Autha::logout();
		return Redirect::to("/login");
	}

}