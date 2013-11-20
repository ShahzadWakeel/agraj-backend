
<div class="grid_24">
	<h1>{{ $story->title }}</h1>
	<p>
	@if(! $is_favorite)
	{{ Form::open("favorite") }}
	{{ Form::submit("Like this story", array( "class" => "btn" )) }}
	@else
	{{ Form::open("unfavorite") }}
	{{ Form::submit("Unlike this story", array( "class" => "btn dark" )) }}
	@endif
	{{ Form::hidden("story_id", $story->id) }}
	{{ Form::close() }}
	</p>
	<p>Previous Rating: {{ $story->ratings()->first() ? $story->ratings()->first()->rating : 0 }}</p>
	<br><br>
</div>

<div class="grid_24">
{{ Form::open("story/".$story->id."/rate") }}
<div class="story grid_24 alpha">
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
			<b>Ratings</b><br>
			Previous Rating: {{ count($content->marks) ? $content->marks[0]->marks : 0 }}
			<br>
			<input type="range" name="rating[{{$content->id}}]" min="0" max="10" id="rating{{$content->id}}" class="slider" value="{{ count($content->marks) ? $content->marks[0]->marks : 0 }}">
			<div id="rating{{$content->id}}-value">0</div>
			
		@endforeach
		</div>
		@endforeach
	</div>
</div>
@endforeach
<br><br>
</div>
{{ Form::submit("Rate", array("class" => "btn")) }}
{{ Form::close() }}
</div>
<script src="{{ URL::to("/js/html5slider.js") }}"></script>
<script>
	$(document).ready(function(){
		var updateValue = function(){
			$("#" + $(this).attr("id") + "-value").html($(this).val());
		};
		$(".slider").each(updateValue).change(updateValue);
	});
</script>