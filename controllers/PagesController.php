<?php

use dflydev\markdown\MarkdownParser;
/**
* Pages
*/
class PagesController extends BaseController {

	public function action_show($page) {
	        $filepath = app_path().DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR.$page.".md";
		if(File::exists($filepath)){
			$markdownParser = new MarkdownParser();

			$markdown = $markdownParser->transformMarkdown(File::get($filepath));

			return $this->render("pages.generic_View", humanize($page), array("markdown" => $markdown));
		}
		else{
			return App::abort(404);
		}
	}

}