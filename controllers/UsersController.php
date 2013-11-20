<?php

/**
* users
*/
class UsersController extends BaseController
{
	public function action_new()
	{	
		$cols = College::all();
		$colleges = array();
		foreach ($cols as $col) {
			$colleges[$col->id] = $col->name;
		}

		$years = require app_path(). DIRECTORY_SEPARATOR . "years.php";

		$depts = require app_path(). DIRECTORY_SEPARATOR . "depts.php";

		return $this->render("users.new", "Register", array(
			"colleges" => $colleges,
			"years" => $years,
			"depts" => $depts
		));
	}

	public function action_create() {
		$user = new User(Input::all());

		$college = College::find(Input::get("college_id"));

		if(!$college) return App::abort(404);

		$user->college_email = $user->college_email. "@" .$college->email_suffix;

		if($user->save()){
			curl_request_async(URL::to("registration_mail/".$user->id), array("email" => $user->email), "POST");

			return Redirect::to("/")->with("success",
					"Please check your email and college email for confirmation link.");
		}
		else return redirect_with_ardent_errors("/register", $user);
	}

	public function action_index() {
		$user = Auth::user();
		return $this->render("users.index", $user->name, array("user" => $user));
	}

	public function action_show($user_url_id) {
		$user = User::findByUrlID($user_url_id);
		
		if(! $user) return App::abort(404);

		return $this->render("users.show", $user->name, array("user" => $user));
	}

	public function action_updatepic(){
		$user = Auth::user();
		
		$destinationPath = "img/profiles/users/";
		$fileName = $user->id;
		Input::file('file')->move($destinationPath, $fileName);
		return Redirect::to("home")->with("success", "Picture Uploaded");
		
	}
	
	public function action_edit() {

		$user = Auth::user();

		$cols = College::all();
		$colleges = array();
		foreach ($cols as $col) {
			$colleges[$col->id] = $col->name;
		}

		$years = require app_path(). DIRECTORY_SEPARATOR . "years.php";

		$depts = require app_path(). DIRECTORY_SEPARATOR . "depts.php";

		return $this->render("users.edit", "Update Profile", array(
			"colleges" => $colleges,
			"years" => $years,
			"depts" => $depts,
			"user" => $user,
		));
	}

	public function action_update(){
		if(Request::segment(1) == "user_password"){
			$user = Auth::user();

			$current_password_is_right = Auth::validate(array(
					"email" => $user->email,
					"password" => Input::get("current_password")
					));

			if($current_password_is_right){
				$user->password = Input::get("password");
				$user->password_confirmation = Input::get("password_confirmation");

				if($user->save(array("password" => "required|confirmed"))){
					return Redirect::to("home")->with("success", "Password Changed");
				}
				else{	
					return redirect_with_ardent_errors("home", $user);
				}
			}
			else{
				return Redirect::to("home")->with('error', "Wrong password");
			}
		}
		else{
			$user = Auth::user();

			$user->mergeArray(Input::all());

			$rules = User::$rules;
			$rules["email"] = "required|email";
			$rules["college_email"] = "required|email";
			$rules["password"] = "";
			$rules["password_confirmation"] = "";

			if($user->save($rules)){
				return Redirect::to("home")->with("success", "Profile Updated");
			}
			else{	
				return redirect_with_ardent_errors("users/edit", $user);
			}
		}
	}

	public function action_track($id) {
		$user = User::find($id);

		return $this->render("users.track", $user->name, array(
			"user" => $user,
		));
	}
}