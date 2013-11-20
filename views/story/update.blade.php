<a href="{{ URL::to("home") }}" class="btn dark">User Home</a>
<br><br><div class="page-header">
	<h1>Story</h1>
</div>
{{ Form::open("story") }}

{{ Form::label("title", "Title") }}
{{ Form::text("title", $story->title, array("required")) }}
<br><br>

<br><br>
Click Section title to open
<br><br>
<div class="story">
@foreach($sections as $section)
<div class="edition-section">
	<div class="title toggler">
	<h3>{{ $section->title }}</h3>
	</div>
	<div class="edition">
	@foreach($section->questions as $question)
	<label for="content-{{ $question->id }}">{{ $question->question }}</label>
	<span class="help-block">{{ $question->hint }}</span>
<textarea name="content-{{ $question->id }}" id="content-{{ $question->id }}" class="ckeditor">
<?php foreach($contents as $key => $content): if($content->question_id = $question->id): ?>{{ $content->content }}<?php unset($contents[$key]); break; endif; ?><?php endforeach; ?>
</textarea>
<br><br>
	@endforeach
	</div>
</div>
@endforeach
</div>

<br><br>

{{ Form::submit("Update", array("class" => "btn btn-primary")) }}
{{ Form::close() }}