<header>
	<div class="container">
		<div class="grid_8">
			<a href="{{ URL::to("/") }}" id="logo"><img src="{{ URL::to("/img/logo.gif") }}" alt="Agraj"></a>
		</div>
		<div class="grid_4">&nbsp;</div>
		<div class="grid_12 alpha">
			<nav>
				<ul class="nav">
					<li><a href="{{ URL::to("/") }}">Home</a></li>
					<li><a href="{{ URL::to("about") }}">About Us</a></li>
					<li><a href="{{ URL::to("vriitant") }}">Vriitant</a></li>
                                        <li><a href="{{ URL::to("judges") }}">Judges</a></li>
					@if(!Auth::guest() || !Autha::guest() || !Authj::guest())
					<li><a href="{{ URL::to("logout") }}" class="btn">Logout</a></li>
					@else
					<li><a href="#" id="login-btn" class="btn">Login</a>
						<div id="login">
							{{ Form::open("login") }}
							{{ Form::label("email", "Email") }}
							{{ Form::email("email", null, array("required" => "required", "placeholder" => "Email")) }}
							<br>
							{{ Form::label("password", "Password") }}
							{{ Form::password("password", array("required" => "required", "placeholder" => "Password")) }}
							<br>
							{{ Form::submit("Login", array("class" => "btn dark")) }} <a href="{{ URL::to("forgot_password") }}">Forgot Password?</a>
							{{ Form::close() }}
						</div>
					</li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
	<script>
	$("#login-btn").click(function(){
		$("#login").fadeToggle(500);
	});
	</script>
</header>