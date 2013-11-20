<?php

/**
* Allotments
*/
class AllotmentsController extends BaseController
{
	public function action_create() {

		$from = Input::get("from");
		$to = Input::get("to");

		$judge = Judge::find(Input::get("judge"));

		$stories = Story::select("id")->whereIn("id", range($from, $to))->get();

		foreach($stories as $story){
			$st = $judge->allotments()->where("story_id", $story->id)->first();

			if(!$st){
				$judge->allotments()->attach($story->id);
			}
		}

		return Redirect::to("admin")->with("success", "Story alloted");
	}
}