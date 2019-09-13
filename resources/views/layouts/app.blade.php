<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Tyme.ml | Time Managment System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href={{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')  }}>
    <link rel="stylesheet" href={{ asset('assets/vendor/linearicons/style.css')  }}>
    <link rel="stylesheet" href={{ asset('assets/vendor/chartist/css/chartist-custom.css') }}>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href={{ asset("assets/css/main.css") }}>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset("assets/img/apple-icon.png") }}>
    <link rel="icon" type="image/png" sizes="96x96" href={{ asset("assets/img/favicon.png") }}>
    <!-- DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  </head>
<body>

  @yield('content')

  <!-- Javascript -->
	<script src={{ asset("assets/vendor/jquery/jquery.min.js") }}></script>
	<script src={{ asset("assets/vendor/bootstrap/js/bootstrap.min.js") }}></script>
	<script src={{ asset("assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js") }}></script>
	<script src={{ asset("assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js") }}></script>
	<script src={{ asset("assets/vendor/chartist/js/chartist.min.js") }}></script>
  <script src={{ asset("assets/scripts/klorofil-common.js") }}></script>
  <!-- Date Picker -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

  $(function() {
    $( "#datepicker-2" ).datepicker();
  });
  </script>
  <!-- Text Editor -->
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'article-ckeditor' );
  </script>
  <!-- REACT -->
  <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
  <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

  <!-- Load our React component. -->
  <script src="like_button.js"></script>
</body>
</html>