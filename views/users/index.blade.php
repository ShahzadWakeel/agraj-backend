<div class="grid_6" id="profile-box">
	{{ $user->picture() }}
	
	<br>
	<h3>{{ $user->name }}</h3>
	{{ $user->year }}<br>
	{{ $user->department }} <br>
	<b>{{ $user->college->name }}</b>

	<form action="/user_picture" method="post" enctype="multipart/form-data">
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="" value="Change Picture">
	</form>
	</div>
<div class="grid_10">
	<b>Hometown</b> <br>
	{{ $user->city_state }}
	<br><br>
	<b>Prepared for JEE in</b> <br>
	{{ $user->jee_city_state }}
	<br><br>
	<b>Entered IIT in</b> <br>
	{{ $user->iit_year }}
	<br><br>
	<b>JEE All India Rank</b><br>
	{{ $user->jee_air }}
	<br><br>
	<a href="{{ URL::to("story") }}" class="btn dark">Participate in Story Writing Competition</a>
	<br><br><br>
	<a href="{{ URL::to("users/edit") }}" class="btn">Edit Profile</a>
	<br><br><br>
	<a href="{{ URL::to("users/edit#change_password") }}" class="btn">Change Password</a>
</div>

<div class="grid_7">
	<?php
		$more = $user->college->users()->skip(rand(1, User::count()))->take(5)->get(); ?>
	@if(count($more))
	<h4>More students from {{ $user->college->name }}</h4>
	<br>
	@foreach($more as $u)
		<a href="{{ URL::to("user/".$u->getUrlID()) }}">{{ $u->name }}</a>
	@endforeach
	@endif
</div>