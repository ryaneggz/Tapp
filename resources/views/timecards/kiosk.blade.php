<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Tapp | TMG Core EMS</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}>
	<link rel="stylesheet" href={{ asset("assets/vendor/font-awesome/css/font-awesome.min.css") }}>
	<link rel="stylesheet" href={{ asset("assets/vendor/linearicons/style.css") }}>
	<link rel="stylesheet" href={{ asset("assets/vendor/chartist/css/chartist-custom.css") }}>
	<!-- MAIN CSS -->
	<link rel="stylesheet" href={{ asset("assets/css/main.css") }}>
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href={{ asset("assets/img/apple-icon.png") }}>
	<link rel="icon" type="image/png" sizes="96x96" href={{ asset("assets/img/favicon.png") }}>
	<!-- TMGcore LOGO background -->
	<style>
		body {
			background-color: white;
			background-image: url("/assets/tmglogo.png");
			background-position: center center;
			background-repeat: no-repeat;
		}

		#footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			background: #0070FF;
			line-height: 1.5;
			text-align: center;
			color: #ffffff;
			font-size: 30px;
			font-family: sans-serif;
			text-shadow: 0 1px 0 #84BAFF;
		}
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div style="height: 100%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

	<!-- END MAIN -->
	<footer>
		<!-- SIGN IN FORM -->
		{{ Form::open(['action' => 'TimecardsController@store', 'method' => 'POST']) }}
		<input type="text" id="kiosk" name="card_number" class="form-control"><br>
		{{ Form::close() }}
		<!-- END of SIGN IN FORM -->
	</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src={{ asset("assets/vendor/jquery/jquery.min.js") }}></script>
	<script src={{ asset("assets/vendor/bootstrap/js/bootstrap.min.js") }}></script>
	<script src={{ asset("assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js") }}></script>
	<script src={{ asset("assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js") }}></script>
	<script src={{ asset("assets/vendor/chartist/js/chartist.min.js") }}></script>
	<script src={{ asset("assets/scripts/klorofil-common.js") }}></script>
	<script>
		// Sets the initial cursor field to ID
	window.onload = function() {
  document.getElementById("kiosk").focus();
	};

	$(function() {
		var data, options;

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>

	@if(isset($showclockedin))
	<div id="footer">UPDATED tthe dicksas 0</div>
	<meta http-equiv="refresh" content="3;URL='/timecards/kiosk'" />

	@elseif(isset($showclockedout))
	<div id="footer">UPDATED the time card because time out was 0</div>
	<meta http-equiv="refresh" content="3;URL='/timecards/kiosk'" />
	@endif


</body>

</html>