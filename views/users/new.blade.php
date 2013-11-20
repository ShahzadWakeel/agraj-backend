<div class="page-header">
	<h1>Register</h1>
</div>
<br><br>
{{ Form::open("register") }}

<div class="grid_24 alpha">
<div class="grid_12 alpha">
{{ Form::label("name", "Name") }}
{{ Form::text("name", Input::old("name"), array("required")) }}
<br><br>

{{ Form::label("email", "Email") }}
{{ Form::email("email", Input::old("email"), array("required")) }} 
<br><br>

{{ Form::label("password", "Password") }}
{{ Form::password("password", array("required")) }}
<br><br>

{{ Form::label("password_confirmation", "Confirm Password") }}
{{ Form::password("password_confirmation", array("required")) }}
<br><br>

</div>
<div class="grid_12 alpha">
{{ Form::label("college_id", "College") }}
{{ Form::select("college_id", $colleges, Input::old("college_id")) }}
<br><br>

{{ Form::label("college_email", "College Email") }}
<span class="help-block" id="email-div">Without @college-webmail. For example, for abc@iitb.ac.in, input abc only.</span>
{{ Form::text("college_email", Input::old("college_email"), array("required")) }}
<br><br>

</div>
</div>
{{ Form::submit("Register", array("class" => "btn btn-primary btn-large")) }}
{{ Form::close() }}