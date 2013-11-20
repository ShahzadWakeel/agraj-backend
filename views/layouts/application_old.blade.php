<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>
		@if(isset($title) && $title)
		{{ $title }} &middot;
		@endif
		Agraj
	</title>
	<script src="{{ URL::to("/js/jquery.js") }}"></script>
	<link rel="stylesheet" href="{{ URL::to("/css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ URL::to("/css/bootstrap-responsive.min.css") }}">
	<link rel="stylesheet" href="{{ URL::to("/css/flat-ui.css") }}">
	<script src="{{ URL::to("/ckedit/ckeditor.js") }}"></script>
	<link rel="stylesheet" href="{{ URL::to("/css/dataTables-custom.css") }}">
</head>
<body>
	@include("layouts.nav")
	<br><br>
	<div class="container">
		@if(Session::get("error"))
		<div class="alert alert-error">{{ Session::get("error") }}</div>
		@endif
		@if(Session::get("success"))
		<div class="alert alert-notice">{{ Session::get("success") }}</div>
		@endif
		@include($view)
	</div>

	<script src="{{ URL::to("/js/jquery.dataTables.min.js") }}"></script>
    <!-- <script src="/js/jquery-ui-1.10.0.custom.min.js"></script> -->
    <!-- <script src="/js/jquery.dropkick-1.0.0.js"></script> -->
    <!-- <script src="/js/custom_checkbox_and_radio.js"></script> -->
    <!-- <script src="/js/custom_radio.js"></script> -->
    <!-- <script src="/js/jquery.tagsinput.js"></script> -->
    <!-- <script src="/js/bootstrap-tooltip.js"></script> -->
    <!-- <script src="/js/jquery.placeholder.js"></script> -->
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
		});
	</script>
</body>
</html>