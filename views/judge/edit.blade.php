<div class="grid_24">
<div class="grid_6">
	<div id="profile-box">
		{{ $judge->picture() }}
	</div>
	<br>
	<form action="/judge_picture" method="post" enctype="multipart/form-data">
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="" value="Change Picture">
	</form>
	<br><br>
	{{ Form::open("judge/update") }}
	{{ Form::label("name", "Name") }}
	{{ Form::text("name", $judge->name, array("required")) }}
	<br>
	{{ Form::label("email", "Email") }}
	{{ Form::email("email", $judge->email, array("required")) }}
	<br>
	{{ Form::label("college_id", "College") }}
	{{ Form::select("college_id", $colleges, Input::old("college_id") ? Input::old("college_id") : $judge->college_id) }}
	<br>
	{{ Form::label("department", "Department") }}
	{{ Form::select("department", $depts, Input::old("department") ? Input::old("department") : $judge->department) }}
	<br>
	{{ Form::label("hostel", "Hostel") }}
	{{ Form::text("hostel", Input::old("hostel") ? Input::old("hostel") : $judge->hostel) }}
	<br>
	{{ Form::label("iit_year", "Passing out year") }}
	{{ Form::text("iit_year", Input::old("iit_year") ? Input::old("iit_year") : $judge->iit_year) }}
	<br>
	{{ Form::label("city_state", "Current City, State") }}
	{{ Form::text("city_state", Input::old("city_state") ? Input::old("city_state") : $judge->city_state) }}
	<br>
	{{ Form::label("social_link", "Link to any of your social profiles (Facebook, twitter etc.)") }}
	{{ Form::text("social_link", Input::old("social_link") ? Input::old("social_link") : $judge->social_link) }}
</div>
<div class="grid_18">
	
 	<br>
	{{ Form::label("iit_impact", "How IIT life made an impact on you?") }}
	{{ Form::textarea("iit_impact", Input::old("iit_impact") ? Input::old("iit_impact") : $judge->iit_impact , array("rows" => 3, "class" => "ckeditor")) }}
	<br>
	{{ Form::label("career", "Your Career Journey") }}
	{{ Form::textarea("career", Input::old("career") ? Input::old("career") : $judge->career, array("rows" => 3, "class" => "ckeditor",)) }}
	<br>
	{{ Form::label("views", "Your views on Education, and Career in the country") }}
	{{ Form::textarea("views", Input::old("views") ? Input::old("views") : $judge->views, array("rows" => 3, "class" => "ckeditor",)) }}
</div>
</div>
<br><br> 

<div class="grid_24">
{{ Form::submit("Update", array("class" => "btn")) }}

{{ Form::close() }}
</div>

<div class="grid_8" id="change_password">
	<br><br>
	<h2>Change Password</h2>
	{{ Form::open("judge_password") }}
	
	{{ Form::label("current_password", "Current Password") }}
	{{ Form::password("current_password") }}
	<br>
	{{ Form::label("password", "Password") }}
	{{ Form::password("password") }}
	<br>
	{{ Form::label("password_confirmation", "Confirm Password") }}
	{{ Form::password("password_confirmation") }}
	<br><br>
	{{ Form::submit("Change", array("class" => "btn")) }}
	{{ Form::close() }}
</div>