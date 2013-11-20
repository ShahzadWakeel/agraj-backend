
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
	<h2>Users</h2>
	<table id="users" class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>College</th>
				<th>Ban User</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td><a href="{{ URL::to("user/".$user->id."/track") }}">{{ $user->name }}</a></td>
			<td>{{ $user->college->name }}</td>
			<td><a href="{{ URL::to("user/ban/".$user->id) }}" data-confirm="Are you sure?" class="click-confirm"><?php if($user->banned_flag) echo "Un-";?>Ban User</a></td>
		</tr>
		@endforeach
		</tbody>
	</table>
	</div>
</div>
</div>