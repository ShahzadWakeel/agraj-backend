<?php


/**
* Questions
*/
class SectionsController extends BaseController{
	
	public function action_create(){
		$section = new Section(Input::all());

		if($section->save()){
			return Redirect::to("admin")->with("success", "Section Created");
		}
		else{
			return redirect_with_ardent_errors("admin", $section);
		}
	}

	public function action_destroy($id) {
		if(Section::find($id)->delete()){
		}

		return Redirect::to("admin")->with("success", "Section Deleted");
	}

	public function action_update($id) {
		if(Section::where("id", "=", $id)->update(array("order" => Input::get("order")))){
		}

		return Redirect::to("admin")->with("success", "Section Updated");
	}


}