<?php

class AboutController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'AboutController@showWelcome');
	|
	*/
public $template = "layouts.application";

	public function action_new() {
		

		return $this->render("pages.about", "About");
	}

}