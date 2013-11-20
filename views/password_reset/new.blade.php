<div class="row">
	<div class="span12">
	@if (Session::has('error'))
	<div class="alert alert-error">{{ trans(Session::get('reason')) }}</div>
	@endif
	<h2>Reset Password</h2>
	{{ Form::open("forgot_password") }}
	
	{{ Form::label("email", "Email") }}
	{{ Form::email("email", "", array("required")) }}
	<br><br>
	{{ Form::submit("Send password reset link.", array("class" => "btn")) }}

	{{ Form::close() }}
	</div>
</div>