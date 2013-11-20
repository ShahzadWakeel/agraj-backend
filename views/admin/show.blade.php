<div class="page-header">
	<h1>{{ $admin->name }}</h1>
</div>
<br><br>
<div class="row">
	<div class="grid_24">
		<a href="{{ URL::to("admin/story") }}" class="btn">Stories and allotment</a>
		<a href="{{ URL::to("admin/judge") }}" class="btn">Judges</a>
		<a href="{{ URL::to("admin/user") }}" class="btn">Users</a>
	</div>
</div>
<br><br>
<div class="row">
	<div class="grid_16">
		<h2>Colleges</h2>
		<table id="colleges" class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		@foreach($colleges as $college)
		<tr>
			<td>{{ $college->id }}</td>
			<td>{{ $college->name }}</td>
			<td>@{{ $college->email_suffix }}</td>
			<td><a href="{{ URL::to("college/delete/".$college->id) }}" data-confirm="Are you sure?" class="click-confirm">Delete</a></td>
		</tr>
		@endforeach
		</tbody>
	</table>
	</div>
	<div class="grid_8">
		<h2>Add College</h2>
		{{ Form::open("/colleges") }}
		<label for="cname">Name</label>
		<input type="text" name="name" id="cname" required>
		<br>
		<label for="email_suffix">Email Suffix without @</label>
		<input type="text" name="email_suffix" id="email_suffix" required>
		<br><br>
		<input type="submit" value="Add College" class="btn">
		{{ Form::close() }}
	</div>

</div>

<div class="row">
	<div class="grid_16">
		<h2>Section</h2>
		<table class="data-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Section Title</th>
					<th>Order</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sections as $section)
				<tr>
					<td>{{ $section->id }}</td>
					<td>{{ $section->title }}</td>
					<td>
						{{ Form::open("/section/update/".$section->id)}}
						<input type="text" name="order" id="order{{$section->id}}" value="{{$section->order}}" class="input-mini">
						<input type="submit" class="btn dark" value="change">
						{{ Form::close() }}
					</td>
					<td><a href="{{ URL::to("section/delete/".$section->id) }}" data-confirm="Are you sure?" class="click-confirm">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="grid_8">
		<h2>Add Section</h2>
		{{ Form::open("/section") }}

		{{ Form::label("title", "Section Title") }}
		{{ Form::text("title", "", array("required")) }}
		<br>
		{{ Form::label("order", "Order") }}
		{{ Form::text("order", "", array("required"))}}
		<br><br>
		{{ Form::submit("Add", array("class" => "btn")) }}

		{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="grid_16">
		<h2>Questions</h2>
		<table class="data-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Question</th>
					<th>Section ID</th>
					<th>Hint</th>
					<th>Order</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($questions as $question)
				<tr>
					<td>{{ $question->id }}</td>
					<td>{{ $question->question }}</td>
					<td>{{ $question->section->id }}</td>
					<td>{{ $question->hint }}</td>
					<td>
						{{ Form::open("/question/update/".$question->id)}}
						<input type="text" name="order" id="order{{$question->id}}" value="{{$question->order}}" class="input-mini">
						<input type="submit" class="btn dark"  value="change">
						{{ Form::close() }}
					</td>
					<td><a href="{{ URL::to("question/delete/".$question->id) }}" data-confirm="Are you sure?" class="click-confirm">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="grid_8">
		<?php $s = array(); ?>
		@foreach ($sections as $sec)
			<?php $s[$sec->id] = $sec->title ?>
		@endforeach
		<h2>Add Question	</h2>
		{{ Form::open("/question") }}

		{{ Form::label("question", "Question") }}
		{{ Form::text("question", "", array("required")) }}
		<br>
		{{ Form::label("section_id", "Section") }}
		{{ Form::select("section_id", $s) }}
		<br>
		{{ Form::label("hint", "Hint") }}
		{{ Form::text("hint", "", array("required")) }}
		<br>
		{{ Form::label("order", "Order") }}
		{{ Form::text("order", "", array("required"))}}
		<br><br>
		{{ Form::submit("Add", array("class" => "btn")) }}

		{{ Form::close() }}
	</div>
</div>
<br>