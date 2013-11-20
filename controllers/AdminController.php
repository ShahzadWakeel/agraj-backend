<?php

/**
* Admin
*/
class AdminController extends BaseController
{
	public function action_show(){
		$admin = Autha::user();
		// $judges = Judge::with("allotments")->get();
		$sections = Section::all();
		$colleges = College::all();
		$questions = Question::all();
		// $stories = Story::with(array("user", "ratings"))->get();
		// $story_count = count($stories);
		// $last_story = end($stories);

		return $this->render("admin.show", $admin->name, array(
			"admin" => $admin,
			// "judges" => $judges,
			"sections" => $sections,
			"colleges" => $colleges,
			// "stories" => $stories,
			"questions" => $questions,
			// "story_count" => $story_count,
			// "last_story_id" => isset($last_story[0]->id) ? $last_story[0]->id : 0
		));
	}

	public function action_judge() {
		$judges = Judge::all();
		return $this->render("admin.judge", "Judges", array(
			"judges" => $judges
		));
	}

	public function action_story() {
		$stories = Story::with(array("user", "ratings"))->get();
		$judges = Judge::with("allotments")->get();
		$story_count = count($stories);
		$last_story = end($stories);

		return $this->render("admin.story", "Stories", array(
			"judges" => $judges,
			"stories" => $stories,
			"story_count" => $story_count,
			"last_story_id" => isset($last_story[0]->id) ? $last_story[0]->id : 0
		));

	}

	public function action_users() {
		$users = User::all();

		return $this->render("admin.users", "Users", array(
			"users" => $users
		));
	}

	public function action_ban_toggle($type, $id) {
		if($type == "judge") {
			$i = Judge::find($id);

			if($i){ 
				$status = !($i->banned_flag);
			        DB::table('judges')
            			->where('id', $i->id)
            			->update(array('banned_flag' => $status));
				//$i->update(array("banned_flag" => $i->name),array("banned_flag" => ! $i->banned_flag)); 
			}
			return Redirect::back()->with("success", "Ban Status Changed");
		}
		elseif($type == "user") {
			$i = User::find($id);

			if($i){
				$status = !($i->banned_flag);
			        DB::table('users')
            			->where('id', $i->id)
            			->update(array('banned_flag' => $status));
				//$i->update(array("banned_flag" => ! $i->banned_flag));
			}
			return Redirect::back()->with("success", "Ban Status Changed");
		}
		else {
			return App::abort(404);
		}
	}
}