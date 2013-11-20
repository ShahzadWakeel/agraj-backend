<?php

/**
* 	Fav
*/
class FavController extends BaseController {

	public function action_create() {
		
		$judge = Authj::user();

		$story = Story::find(Input::get("story_id"));

		$is_favorite = $judge->favs()->where("story_id", "=", $story->id)->first() ? TRUE : FALSE;

		if(!$is_favorite){
			$judge->favs()->attach($story->id);
		}

		return Redirect::back()->with("success", "Story liked");

	}

	public function action_destroy() {
		$judge = Authj::user();

		$story = Story::find(Input::get("story_id"));

		try {
			$judge->favs()->detach($story->id);//where("story_id", "=", $story->id)->delete();	
		} catch (Exception $e) {
			
		}

		return Redirect::back()->with("succes", "Story unliked");
	}

}