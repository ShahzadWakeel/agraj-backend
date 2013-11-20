<?php

/**
* Mails Controller
*/
class MailsController extends BaseController{
	
	public function action_registration_mail($user_id){

		$user = User::find($user_id);

		if($user){
			Mail::send(array("text" => "emails.confirm_email"), array("user" => $user), function($m) use($user){
				$m->to($user->email)->subject("Confirm Registration");
			});

			Mail::send(array("text" => "emails.confirm_college"), array("user" => $user), function($m) use($user){
				$m->to($user->college_email)->subject("Confirm Registration");
			});
		}
	}

	public function action_password_mail() {

		$credentials = array('email' => Input::get("email"));

		Password::remind($credentials, function($m){
    		$m->subject("Reset Password");
    	});
	}
}