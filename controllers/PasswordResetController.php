<?php

/**
* Password Resets
*/
class PasswordResetController extends BaseController {

	public function action_new() {
		return $this->render("password_reset.new", "Reset Password");
	}

	public function action_create()	{
		$credentials = array('email' => Input::get('email'));

		curl_request_async(URL::to("password_mail"), $credentials, "POST");

    	return Redirect::to("/")->with("success", "Please check your email for passsword reset link.");
	}

	public function action_edit($token) {
		return $this->render("password_reset.edit", "Reset Password", array(
			"token" => $token
		));
	}

	public function action_update() {
		$credentials = array('email' => Input::get('email'));

		$password_confirmation = Input::get("password_confirmation");

		return Password::reset($credentials, function($user, $password) use ($password_confirmation) {
			$user->password = $password;
			$user->password_confirmation = $password_confirmation;

			if($user->save(array(
				"password" => "required|confirmed"
			))){
				return Redirect::to('/')->with("success", "Password Changed");
			}
			else{
				return redirect_with_ardent_errors("/", $user);
			}
		});
	}

}