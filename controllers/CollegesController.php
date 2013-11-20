<?php

/**
* Colleges
*/
class CollegesController extends BaseController
{
	
	public function action_create() {
		$college = new College(Input::all());

		if($college->save()){
			return Redirect::to("admin")->with("success", "College Created");
		}
		else{
			return redirect_with_ardent_errors("admin", $college);
		}
	}
	
	public function action_destroy($id) {
		if(College::find($id)->delete()){
		}

		return Redirect::to("admin")->with("success", "College Deleted");
	}
	
}