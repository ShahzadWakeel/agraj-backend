<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "SessionsController@action_new");

Route::get('/login', array("as" => "login", "uses" => "SessionsController@action_new"));
Route::post('/login', "SessionsController@action_create");
Route::get('/logout', "SessionsController@action_destroy");

Route::get('/register', "UsersController@action_new");
Route::post('/register', "UsersController@action_create");

Route::post('/registration_mail/{id}', "MailsController@action_registration_mail");

Route::get("/confirm/{token}", "ConfirmationsController@action_new");
Route::post("/confirm", "ConfirmationsController@action_create");

Route::get("/about", "AboutController@action_new");
Route::get("/judges", "JudgesController@action_new");
Route::get("/vriitant", "VriitantController@action_new");
Route::get("/disclaimer", "DisclaimerController@action_new");

/// Admin Routes
Route::get("/admin", array("uses" => "AdminController@action_show", "before" => "autha"));

Route::get("admin/judge", array("uses" => "AdminController@action_judge", "before" => "autha"));
Route::get("admin/user", array("uses" => "AdminController@action_users", "before" => "autha"));
Route::post("/judge/add", array("uses" => "JudgeController@action_create", "before" => "autha"));

Route::get("admin/story", array("uses" => "AdminController@action_story", "before" => "autha"));

Route::post("/colleges", array("uses" => "CollegesController@action_create", "before" => "autha"));
Route::get("/college/delete/{id}", array("uses" => "CollegesController@action_destroy", "before" => "autha"));
Route::post("/question", array("uses" => "QuestionsController@action_create", "before" => "autha"));
Route::get("/question/delete/{id}", array("uses" => "QuestionsController@action_destroy", "before" => "autha"));
Route::post("/question/update/{id}", array("uses" => "QuestionsController@action_update", "before" => "autha"));
Route::post("/section", array("uses" => "SectionsController@action_create", "before" => "autha"));
Route::get("/section/delete/{id}", array("uses" => "SectionsController@action_destroy", "before" => "autha"));
Route::post("/section/update/{id}", array("uses" => "SectionsController@action_update", "before" => "autha"));
Route::post("/allotment", array("uses" => "AllotmentsController@action_create", "before" => "autha"));
Route::get("/story/{id}/track", array("uses" => "StoryController@action_show", "before" => "autha"));
Route::get("/judge/{id}/track", array("uses" => "JudgeController@action_index", "before" => "autha"));
Route::get("/user/{id}/track", array("uses" => "UsersController@action_track", "before" => "autha"));

Route::get("/{type}/ban/{id}", array("uses" => "AdminController@action_ban_toggle", "before" => "autha"));

/// Judge Routes
Route::get("/judge", array("uses" => "JudgeController@action_show", "before" => "authj"));
Route::get("/judge/edit", array("uses" => "JudgeController@action_edit"));
Route::post("/judge/update", array("uses" => "JudgeController@action_update"));
Route::post("/judge_picture", array("uses" => "JudgeController@action_updatepic"));

Route::get("/judge/story", array("uses" => "JudgeController@action_story", "before" => "authj"));

Route::get("/story/{id}/rate", array("uses" => "RatingsController@action_show", "before" => "authj"));
Route::post("/story/{id}/rate", array("uses" => "RatingsController@action_create", "before" => "authj"));
Route::post("/judge_password", array("uses" => "JudgeController@action_update", "before" => "authj"));
Route::post("/favorite", array("uses" => "FavController@action_create", "before" => "authj"));
Route::post("/unfavorite", array("uses" => "FavController@action_destroy", "before" => "authj"));

/// User Routes
Route::get("home", array("uses" => "UsersController@action_index", "before" => "auth"));
Route::get("story", array("uses" => "StoryController@action_new", "before" => "auth"));
Route::post("story", array("uses" => "StoryController@action_create", "before" => "auth"));
Route::get("users/edit", array("uses" => "UsersController@action_edit", "before" => "auth"));
Route::post("users/update", array("uses" => "UsersController@action_update", "before" => "auth"));
Route::post("user_password", array("uses" => "UsersController@action_update", "before" => "auth"));
Route::post("/user_picture", array("uses" => "UsersController@action_updatepic"));

/// Guest Routes
Route::get("forgot_password", array("uses" => "PasswordResetController@action_new", "before" => "guest"));
Route::post("forgot_password", array("uses" => "PasswordResetController@action_create", "before" => "guest"));
Route::get("password/reset/{token}", array("uses" => "PasswordResetController@action_edit", "before" => "guest"));
Route::post("password/reset/{token}", array("uses" => "PasswordResetController@action_update", "before" => "guest"));

Route::post("password_mail", "MailsController@action_password_mail");


/// Generic Routes
Route::get("user/{user_url_id}", "UsersController@action_show");
Route::get("judge/{judge_url_id}", "JudgeController@action_profile_show");
Route::any("{page}", "PagesController@action_show");

Route::any("{a}/{b}", "UsersController@unexisting_action");
Route::any("{a}/{b}/{c}", "UsersController@unexisting_action");
Route::any("{a}/{b}/{c}/{d}", "UsersController@unexisting_action");
Route::any("{a}/{b}/{c}/{d}/{e}", "UsersController@unexisting_action");