<div class="page-header">
	<h1>Confirm Registration</h1>
</div>

Email: {{ $email }}
<br><br>
{{ Form::open("confirm") }}
{{ Form::hidden("email", $email) }}
{{ Form::label("part_1","Part 1 Code. Sent on ".$email) }}
{{ Form::text("part_1", "", array("required")) }}
<br>
{{ Form::label("part_2","Part 2 Code. Sent on institute mail") }}
{{ Form::text("part_2", "", array("required")) }}
<br><br>
{{ Form::submit("Confirm", array("class" => "btn")) }}
{{ Form::close() }}