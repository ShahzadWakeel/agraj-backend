<div class="grid_24">
<div class="grid_6">
	<div id="profile-box">
		{{ //$judge->picture() }}
		<br>
		<h3>{{ //$judge->name }}</h3>
		{{ //$judge->iit_year }} Passout<br>
		<b>{{ //$judge->college->name }}</b>
	</div>
	<br><br>
</div>
<div class="grid_17">
	<b>Department</b> <br>
	{{ //$judge->department }}
	<br><br>
	<b>Hostel</b> <br>
	{{ //$judge->hostel }}
	<br><br>
	<b>Currently living in</b> <br>
	{{ //$judge->city_state }}
	<br><br>
	<b>How IIT life made an impact on me?</b><br>
	{{ //$judge->iit_impact }}
	<br><br>
	<b>My Career Journey</b><br>
	{{ //$judge->career }}
	<br><br>
	<b>My views on Education, and Career in the country</b><br>
	{{ //$judge->views }}
	<br><br>
</div>
</div>