<?php


/**
* 
*/
class StoryController extends BaseController{
	
	public function action_new(){
		$sections = Section::orderBy("order")
						->with(array(
							"questions" => function($q) {
								$q->orderBy("order");
							}
						))
						->get();

		$user = Auth::user();

		$story = $user->story;

		if(! $story){
			return $this->render("story.new", "Story", array(
				"sections" => $sections
			));
		}
		else{
			$contents = $story->contents()->get(); 
			return $this->render("story.update", "Story", array(
				"sections" => $sections,
				"story" => $story,
				"contents" => $contents
			));
		}
	}

	public function action_create() {
		$user = Auth::user();

		$story = $user->story;

		if(! $story){
			$story = new Story(array("title" => Input::get("title"), "user_id" => $user->id));

			if($story->save()){
				$questions = Question::select("id")->get();

				foreach($questions as $q){
					$content = new Content(array(
						"story_id" => $story->id,
						"question_id" => $q->id,
						"content" => Input::get("content-".$q->id),
					));

					$content->save();
				}

				return Redirect::to("home")->with("success", "Story saved");
			}
			else{
				return redirect_with_ardent_errors("/story", $story);
			}
		}
		else{
			return $this->action_update();
		}
	}

	public function action_update() {
		$user = Auth::user();
		$story = $user->story;

		if($story->title != Input::get("title")){
			$story->title = Input::get("title");

			if(!$story->save()){
				$errors = $story->errors()->all();
				
				$message = implode("<br>", $errors);
				
				return Redirect::to("/story")->with('error', $message);
			}
		}

		$questions = Question::select("id")->get();

		foreach($questions as $q){
			$content = $story->contents()->where("question_id", "=", $q->id)->first();

			if($content){
				if($content->content != Input::get("content-".$q->id)){
					$content->content = Input::get("content-".$q->id);
					$content->save();
				}
			}
			else{
				$content = new Content(array(
					"story_id" => $story->id,
					"question_id" => $q->id,
					"content" => Input::get("content-".$q->id),
				));

				$content->save();
			}
		}
		return Redirect::to("home")->with("success", "Story saved");
	}

	public function action_show($id) {
		$story = Story::with(array(
						"ratings" => function($q){
							$q->with("judge");
						}
					))
					->where("id", "=", $id)
					->first();

		$sections = Section::with(array(
				"questions" => function($q) use ($id) {
					$q->orderBy("order")->with(array(
						"contents" => function($qr) use ($id) {
							$qr->where("story_id","=",$id)
								->with(array(
									"marks" => function($qry){
										$qry->with(array("judge"));
									},
								));
							}
					));
				}
			))->get();

		return $this->render("story.show", $story->title, array(
			"story" => $story,
			"sections" => $sections,
		));
	}

}