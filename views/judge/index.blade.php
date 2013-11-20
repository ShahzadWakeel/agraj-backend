<div class="grid_24">
<div class="grid_6">
	<div id="profile-box">
		<br>
		<h3>{{ $judge->name }}</h3>
		{{ $judge->email }} <br> <br>
	</div>
	<br><br>
</div>
<div class="grid_17">
	<b>Department</b> <br>
	{{ $judge->department }}
	<br><br>
	<b>Hostel</b> <br>
	{{ $judge->hostel }}
	<br><br>
	<b>Currently living in</b> <br>
	{{ $judge->city_state }}
	<br><br>
	<b>How IIT life made an impact on me?</b><br>
	{{ $judge->iit_impact }}
	<br><br>
	<b>My Career Journey</b><br>
	{{ $judge->career }}
	<br><br>
	<b>My views on Education, and Career in the country</b><br>
	{{ $judge->views }}
	<br><br>
</div>
</div>

<div class="grid_24">
@foreach($judge->ratings as $r)
<div class="grid_12">
		<b>{{ $r->story->title }} | Rating: {{ $r->rating }}</b>
		<p>
			@foreach($r->story->contents as $c)
			Question {{ $c->question_id }}: {{ $c->marks[0]->marks }} marks <br>
			@endforeach
		</p>
		<hr>
</div>
@endforeach
</div>