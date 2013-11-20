<?php


/**
* Questions
*/
class QuestionsController extends BaseController{
	
	public function action_create(){
		$question = new Question(Input::all());

		if($question->save()){
			return Redirect::to("admin")->with("success", "Question Created");
		}
		else{
			return redirect_with_ardent_errors("admin", $question);
		}
	}

	public function action_destroy($id) {
		if(Question::find($id)->delete()){
		}

		return Redirect::to("admin")->with("success", "Question Deleted");
	}

	public function action_update($id) {
		if(Question::where("id", "=", $id)->update(array("order" => Input::get("order")))){
		}

		return Redirect::to("admin")->with("success", "Question Updated");
	}


}