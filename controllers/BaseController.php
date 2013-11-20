<?php

class BaseController extends Controller {

	public $template = "layouts.application";
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function __construct() {
		if(php_sapi_name() == 'cli-server'){
			// Event::listen('illuminate.query', function($sql, $bindings, $time) {
			// 	// Log::info($sql."#".$bindings);
			// 	file_put_contents("php://stdout", "\n".$sql." --> (". implode(", ", $bindings) .")\n");
			// });
		}

		App::missing(function($exception) {
                          App::abort(404, 'Page not found');
			//return $this->render("pages.404", "Page not found");
    	});
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function render($view, $title="", $data=array())
	{
		$data["title"] = $title;
		$data["view"] = $view;

		return View::make($this->template, $data);
	}

}