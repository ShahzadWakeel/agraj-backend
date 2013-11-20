
<div class="grid_16">
		<h2>Favorites</h2>
		<table id="bookmark" class="data-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Story Title</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($favs as $fav)
				<tr>
					<td>{{ $i }}</td>
					<td><a href="{{ URL::to("/story/".$fav->id."/rate") }}">{{ $fav->title }}</a></td>
					<?php $i++; ?>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br><br><br>
	</div>
	<div class="grid_16">
		<h2>Alloted Stories</h2>
		<table id="allotments" class="data-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Story Title</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($allotments as $a)
				<tr>
					<td>{{ $i }}</td>
					<td><a href="{{ URL::to("/story/".$a->id."/rate") }}">{{ $a->title }}</a></td>
					<?php $i++; ?>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>