<a href="{{ URL::to("home") }}" class="btn dark">User Home</a>
<br><br><div class="page-header grid_24">
	<h1>{{ $story->title }}</h1>
	<p>
		Ratings<br><br>
		@foreach($story->ratings as $r)
		{{ $r->judge->name }}: {{$r->rating}}<br>
		@endforeach
	</p>
</div>
<div class="story grid_24">

<br><br>
@foreach($sections as $section)
<div class="edition-section">
	<div class="title toggler">
	<h3>{{ $section->title }}</h3>
	</div>
	<div class="edition">
		<br><br>
		@foreach($section->questions as $question)
		<div class="grid_18">
		<h4>{{ $question->question }}</h4>
		<p>{{ $question->hint }}</p>
		<br><br>
		@foreach($question->contents as $content)
		{{ $content->content }}
		<br><br>
		</div>
		<div class="grid_6">
			Ratings<br>
			@foreach($content->marks as $m)
			{{ $m->judge->name }}: {{$m->marks}}<br>
			@endforeach
		@endforeach
		</div>
		@endforeach
	</div>
</div>
@endforeach
</div>