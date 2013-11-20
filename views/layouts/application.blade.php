<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>
		@if(isset($title) && $title)
		{{ $title }} &middot;
		@endif
		AGRAJ
	</title>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<script src="{{ URL::to("/js/jquery.js") }}"></script>
	<link rel="stylesheet" href="{{ URL::to("/css/style.css") }}">
	<script src="{{ URL::to("/ckedit/ckeditor.js") }}"></script>
	<!-- <link rel="stylesheet" href="{{ URL::to("/css/dataTables-custom.css") }}"> -->
</head>
<body>
	@include("layouts.nav")
	<br><br>
	<div class="main">
		@if(Session::get("error"))
		<div class="alert alert-error">{{ Session::get("error") }}</div>
		@endif
		@if(Session::get("success"))
		<div class="alert alert-success">{{ Session::get("success") }}</div>
		@endif
		<div class="container">
		@include($view)
		</div>
	</div>

	<script src="{{ URL::to("/js/jquery.dataTables.min.js") }}"></script>
    <!-- <script src="/js/jquery-ui-1.10.0.custom.min.js"></script> -->
    <!-- <script src="/js/jquery.dropkick-1.0.0.js"></script> -->
    <!-- <script src="/js/custom_checkbox_and_radio.js"></script> -->
    <!-- <script src="/js/custom_radio.js"></script> -->
    <!-- <script src="/js/jquery.tagsinput.js"></script> -->
    <!-- <script src="/js/bootstrap-tooltip.js"></script> -->
    <!-- <script src="/js/jquery.placeholder.js"></script> -->
	<br><br><br>
    <hr><hr class="overline">
	<footer>
		<br>
		<div class="container">
			<div class="grid_6">
				<a href="#" class="logo"><img src="{{ URL::to("img/logo.gif") }}" alt="Agraj"></a>
			</div>
			<div class="grid_10 alpha">
				<h2>About</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, adipisci, nihil, alias aperiam consequatur recusandae molestias aliquam perferendis officia deleniti vel veniam magnam ipsum voluptatem cum minima quas voluptate quia!
				</p>
			</div>
			<div class="grid_4">
				<nav>
					<ul class="nav">
						<li><a href="#">Home</a></li>
					        <li><a href="{{ URL::to("about") }}">About Us</a></li>
					        <li><a href="{{ URL::to("vriitant") }}">Vriitant</a></li>
					        
					</ul>
				</nav>
			</div>
			<div class="grid_4">
				<nav>
					<ul class="nav">
                                                <li><a href="{{ URL::to("judges") }}">Judges</a></li>
                                                <li><a href="{{ URL::to("disclaimer") }}">Disclaimer & Terms of Use</a></li>
						<!--<li><a href="#">Home</a></li>--!>
						<!--<li><a href="#">About</a></li>--!>
						<!--<li><a href="#">Link1</a></li>--!>
						<!--<li><a href="#">Link2</a></li>--!>
					</ul>
				</nav>
			</div>
		</div>
	</footer>
	<script>
		$(document).ready(function(){
			$('.data-table').each(function(){
				$(this).dataTable( {
		        	"bJQueryUI": true,
		        	"sPaginationType": "full_numbers"
		    	});
			});

			$(".click-confirm").click(function(e){
				var elConfirm = $(this).data("confirm");
				if(!elConfirm){
					elConfirm = "Are you sure?"
				}

				var confirmation = confirm(elConfirm);

				return confirmation;
			});

			$(".toggler").click(function(e) {
				var wrapper = $(this).parent();

				var isOpen = $(wrapper).hasClass("active");

				$(".story .active").each(function(e) {
					$(this).removeClass("active");
				});

				if(! isOpen)
					$(wrapper).addClass("active");

			});
		});
	</script>
</body>
</html>