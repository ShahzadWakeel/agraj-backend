<div class="row">
	<div class="span12">
		<h2>Reset Password</h2>

		{{ Form::open("password/reset/".$token) }}
		{{ Form::hidden("token", $token) }}
		
		{{ Form::label("email", "Email") }}
		{{ Form::email("email", "", array("required")) }}
		<br>
		{{ Form::label("password", "Password") }}
		{{ Form::password("password", array("required")) }}
		<br>
		{{ Form::label("password_confirmation", "Confirm Password") }}
		{{ Form::password("password_confirmation", array("required")) }}
		<br><br>
		{{ Form::submit("Reset Password", array("class" => "btn")) }}

		{{ Form::close() }}
	</div>
</div>