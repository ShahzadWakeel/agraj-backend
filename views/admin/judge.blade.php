
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
	<div class="row">
	<div class="grid_24">
	<h2>Judges</h2>
	<table id="judges" class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Alloted</th>
				<th>Story IDs</th>
				<th>Ban Judge</th>
			</tr>
		</thead>
		<tbody>
		@foreach($judges as $judge)
		<tr>
			<td>{{ $judge->id }}</td>
			<td><a href="{{ URL::to("judge/".$judge->id."/track") }}">{{ $judge->name }}</a></td>
			<td>{{ $judge->allotments()->count() }}</td>
			<td><?php foreach($judge->allotments()->get() as $a) echo $a->id."|"; ?></td>
			<td><a href="{{ URL::to("judge/ban/".$judge->id) }}" data-confirm="Are you sure?" class="click-confirm"><?php if($judge->banned_flag) echo "Un-";?>Ban Judge</a></td>
		</tr>
		@endforeach
		</tbody>
	</table>
	<br><br><br>
	</div>

	<div class="grid_8">
		<h2>Add Judge</h2>
		{{ Form::open("judge/add") }}
		<label for="name">Name</label>
		<input type="text" name="name" id="name" required>
		<br>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" required>
		<br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required>
		<br><br>
		<input type="submit" value="Add Judge" class="btn">
		{{ Form::close() }}
	</div>
</div>
</div>