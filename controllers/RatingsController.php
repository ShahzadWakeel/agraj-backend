<?php

/**
* Ratings
*/
class RatingsController extends BaseController {

	public function action_show($id) {
		$judge = Authj::user();
		$story = Story::with(array(
						"contents" => function($query){},
						"ratings" => function($query) use($judge){
							$query->where('judge_id', '=', $judge->id)->first();
						}))->where("id", "=", $id)->first();

		if(!$story) {
			return App::abort(404);
		}
		$scopeResolve = array(
			"story" => $story,
			"judge" => $judge,
		);
		$sections = Section::with(array(
				"questions" => function($q) use ($scopeResolve) {
					$q->orderBy("order")->with(array(
						"contents" => function($qr) use ($scopeResolve) {
							$qr->where("story_id","=",$scopeResolve["story"]->id)
								->with(array(
									"marks" => function($qry) use ($scopeResolve) {
										$qry->where('judge_id', '=', $scopeResolve["judge"]->id)->get();
									},
								));
							}
					));
				}
			))->get();

		$contents = $story->contents()
						->with(array(
							"question" => function($query){},
							"marks" => function($query) use ($judge){
								$query->where('judge_id', '=', $judge->id)->first();
							}
						))
						->get();

		$is_favorite = $judge->favs()->where("story_id", "=", $id)->first() ? TRUE : FALSE;
		return $this->render("ratings.index", $story->title, array(
			"judge" => $judge,
			"story" => $story,
			"sections" => $sections,
			"is_favorite" => $is_favorite
		));
	}

	public function action_create($id){
		$judge = Authj::user();
		$inputs = Input::get("rating");
		$count = count($inputs) ? count($inputs) : Question::count();

		$rating = array_sum($inputs)/$count;

		$story = Story::find($id);

		if(!$story) {
			return App::abort(404);
		}

		foreach ($inputs as $key => $input) {
			$mark = $judge->marks()->where("content_id", "=", $key)->first();
			if($mark){
				if($mark->marks != $input){
					$mark->marks = $input;
					$mark->save();
				}
			}
			else{
				$judge->marks()->save(new Mark(array("content_id" => $key, "marks" => $input)));
			}
		}

		$r = $story->ratings()->where("judge_id", "=", $judge->id)->first();
		if($r){
			if($r->rating != $rating){
				$r->rating = $rating;
				$r->save();
			}
		}
		else{
			$story->ratings()->save(new Rating(array("judge_id" => $judge->id, "rating" => $rating)));
		}

		return Redirect::back()->with("success", "Rated successfully");
	}

}