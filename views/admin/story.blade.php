
<div class="row">
	<div class="grid_24">
                <a href="{{ URL::to("admin") }}" class="btn" style="float:right;">Admin</a>
		<a href="{{ URL::to("admin/story") }}" class="btn" style="float:right;">Stories and allotment</a>
		<a href="{{ URL::to("admin/judge") }}" class="btn" style="float:right;">Judges</a>
		<a href="{{ URL::to("admin/user") }}" class="btn" style="float:right;">Users</a>
	</div>
</div>
<br><br>
<div class="grid_24">
	<h1>Stories</h1>
	<br>
	<div class="grid_24">
		<h2>Total Stories: {{ $story_count }}. Last Story ID: {{ $last_story_id }}</h2>
		{{ Form::open("allotment","POST" ,array("class" => "form-inline")) }}
		Allot stories from
		<input type="text" name="from" id="from" class="input-small" required placeholder="1">
		to
		<input type="text" name="to" id="to" class="input-small" required placeholder="10">
		to judge
		<select name="judge" id="judge">
			@foreach($judges as $j)
			<option value="{{ $j->id }}">{{ $j->name }}</option>
			@endforeach
		</select>
		<input type="submit" value="Go" class="btn">
		{{ Form::close() }}
	</div>
</div>

<div class="grid_16">
	<h2>Stories</h2>
	<table id="stories" class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>User</th>
				<th>Avg. Rating</th>
			</tr>
		</thead>
		<tbody>
		@foreach($stories as $story)
		<tr>
			<td>{{ $story->id }}</td>
			<td><a href="{{ URL::to("story/".$story->id."/track")}}">{{ $story->title }}</a></td>
			<td>{{ $story->user->name }}</td>
			<?php $count = count($story->ratings) ? count($story->ratings) : 1 ?>
			<?php $rating = 0; foreach ($story->ratings as $r) $rating += $r->rating; $rating = $rating/$count; ?>
			<td>{{ $rating }}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
</div>