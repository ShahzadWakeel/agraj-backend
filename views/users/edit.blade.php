<a href="{{ URL::to("home") }}" class="btn dark">User Home</a>
<br><br>
<div class="page-header">
	<h1>Update Profile</h1>
</div>


{{ Form::open("users/update") }}

<div class="grid_24 alpha">
<div class="grid_12 alpha">
{{ Form::label("name", "Name") }}
{{ Form::text("name", Input::old("name") ? Input::old("name") : $user->name, array("required")) }}
<br><br>

{{ Form::label("email", "Email") }}
{{ Form::email("email", Input::old("email") ? Input::old("email") : $user->email, array("required")) }}
<br><br>

{{ Form::label("gender_q", "Gender") }}
{{ Form::radio("gender", 1, $user->gender == 1, array("id" => "g1")) }} {{ Form::label("g1", "Male", array("class"=>"inline")) }}
{{ Form::radio("gender", 0, $user->gender == 0, array("id" => "g2")) }} {{ Form::label("g2", "Female", array("class"=>"inline")) }}
<br><br>

{{ Form::label("city_state", "Hometown City, State") }}
{{ Form::text("city_state", Input::old("city_state") ? Input::old("city_state") : $user->city_state, array("required")) }}
<br><br>

{{ Form::label("jee_city_state", "JEE Preparation City, State") }}
{{ Form::text("jee_city_state", Input::old("jee_city_state") ? Input::old("jee_city_state") : $user->jee_city_state, array("required")) }}
<br><br>

{{ Form::label("social_link", "Link to any of your social profiles (Facebook, twitter etc.)") }}
{{ Form::text("social_link", Input::old("social_link") ? Input::old("social_link") : $user->social_link, array("required")) }}
<br><br>

</div>
<div class="grid_12 alpha">
{{ Form::label("college_id", "College") }}
{{ Form::select("college_id", $colleges, Input::old("college_id") ? Input::old("college_id") : $user->college_id) }}
<br><br>

{{ Form::label("college_email", "College Email") }}
<span class="help-block" id="email-div">Without @college-webmail. For example, for abc@iitb.ac.in, input abc only.</span>
{{ Form::text("college_email", Input::old("college_email") ? Input::old("college_email") : $user->college_email, array("required")) }}
<br><br>

{{ Form::label("iit_year", "Year entered in IIT")}}
{{ Form::text("iit_year", Input::old("iit_year") ? Input::old("iit_year") : $user->iit_year, array("required")) }}
<br><br>

{{ Form::label("year", "Year")}}
{{ Form::select("year", $years, Input::old("year") ? Input::old("year") : $user->year) }}
<br><br>

{{ Form::label("department", "Department")}}
{{ Form::select("department", $depts, Input::old("department") ? Input::old("department") : $user->department) }}
<br><br>

{{ Form::label("jee_air", "JEE AIR") }}
{{ Form::text("jee_air", Input::old("jee_air") ? Input::old("jee_air") : $user->jee_air, array("required")) }}

{{ Form::label("jee_repeat_q", "Cleared JEE in first attempt?") }}
{{ Form::radio("jee_repeat", 0, $user->jee_repeat == 0, array("id" => "rep1")) }} {{ Form::label("rep1", "Yes", array("class"=>"inline")) }}
{{ Form::radio("jee_repeat", 1, $user->jee_repeat == 1, array("id" => "rep2")) }} {{ Form::label("rep2", "No", array("class"=>"inline")) }}
<br><br>
</div>
</div>
{{ Form::submit("Update", array("class" => "btn btn-primary btn-large")) }}
{{ Form::close() }}

<div class="grid_8" id="change_password">
	<br><br>
	<h2>Change Password</h2>
	{{ Form::open("user_password") }}
	
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