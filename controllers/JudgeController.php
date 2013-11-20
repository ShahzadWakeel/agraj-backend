<?php

/**
* judge Controller
*/
class JudgeController extends BaseController
{
	
	public function action_create(){
		$judge = new Judge(Input::all());

		if($judge->forceSave()){
		return Redirect::to("admin/judge")->with("success", "Judge Created");
		}
		else{
			return redirect_with_ardent_errors("admin/judge", $judge);
		}
	}
	
	public function action_updatepic(){
		$judge = Authj::user();
		
		$destinationPath = "img/profiles/judges/";
		$fileName = $judge->id;
		Input::file('file')->move($destinationPath, $fileName);
		return Redirect::to("judge/edit")->with("success", "Picture Uploaded");
		
	}
	
	public function action_update(){ 
		if(Request::segment(1) == "judge_password"){
			$judge = Authj::user();

			$current_password_is_right = Authj::validate(array(
					"email" => $judge->email,
					"password" => Input::get("current_password")
					));

			if($current_password_is_right){
				$judge->password = Input::get("password");
				$judge->password_confirmation = Input::get("password_confirmation");

				if($judge->save(array("password" => "required|confirmed"))){
					return Redirect::to("judge")->with("success", "Password Changed");
				}
				else{	
					return redirect_with_ardent_errors("judge", $judge);
				}
			}
			else{
				return Redirect::to("judge")->with('error', "Wrong password");
			}
		}
		
		else{
			$judge = Authj::user();
			$judge->mergeArray(Input::all());

			$rules = Judge::$rules;
			$rules["email"] = "required|email";

			if($judge->save($rules)){
				return Redirect::to("judge")->with("success", "Profile Updated");
			}
			else{	
				return redirect_with_ardent_errors("judge/edit", $judge);
			}
		}
	}

	public function action_index($id) {
		$judge = Judge::with(array(
					"ratings" => function($q)  use ($id){
						$q->with(array(
							"story" => function($q1)  use ($id){
								$q1->with(array(
									"contents" => function($q2)  use ($id){
										$q2->with(array(
											"marks" => function($q3) use ($id){
												$q3->where("judge_id", "=", $id);
											}
										));
									}
								));
							}
						));
					}
				))
				->where("id", "=", $id)->first();

		return $this->render("judge.index", $judge->name, array(
			"judge" => $judge
		));
	}

	public function action_show() {
		$judge = Authj::user();;

		return $this->render("judge.show", $judge->name, array(
			"judge" => $judge,
		));
	}

	public function action_profile_show($judge_url_id) {
		$j = Judge::findByUrlID($judge_url_id);
		
		if(! $j) return App::abort(404);

		return $this->render("judge.profile_show", $j->name, array("judge" => $j));
	}

	public function action_edit() {
		$judge = Authj::user();

		$cols = College::all();
		$colleges = array();
		foreach ($cols as $col) {
			$colleges[$col->id] = $col->name;
		}

		$depts = require app_path(). DIRECTORY_SEPARATOR . "depts.php";

		if(! $judge) return App::abort(404);

		return $this->render("judge.edit", $judge->name, array(
			"judge" => $judge,
			"colleges" => $colleges,
			"depts" => $depts,
		));
	}

	public function action_story() {
		$judge = Authj::user();;

		$allotments = $judge->allotments()->get();
		$favs = $judge->favs()->get();
                
		return $this->render("judge.story", $judge->name, array(
			"judge" => $judge,
			"allotments" => $allotments,
			"favs" => $favs
		));
	}

}