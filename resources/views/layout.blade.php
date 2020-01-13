<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Бронированеи митиг румма</title>
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- lightgallery -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/lightgallery/css/lightgallery.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/main_style.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/skins/_all-skins.min.css') }}">
  <link href="{{asset('assets/plugins/calendar/style.css')}}"     rel='stylesheet' />
<!-- jQuery 2.2.3 -->
<script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
@yield('calendar')
</head>
<body>
	<header>
			<div class="main-menu">
				<nav class="navbar navbar-default">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#id-menu" aria-expanded="false">
								<span class="sr-only"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-right" id="id-menu">
							<ul class="nav navbar-nav">
								@if(Auth::check())
									<li ><a href="{{route('lists')}}">Главное <span class="sr-only">(current)</span></a></li>
									<li><a href="{{route('bookings.index')}}">Забранировать</a></li>
									<li><a href="{{route('logout')}}">Выход</a></li>
									<li><a><b>{{Auth::user()->name}}</b></a></li>
								@else
									<li><a href="{{route('login')}}">Вход</a></li>
									<li><a href="{{route('register')}}">Регистрация</a></li>
								@endif

							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-->
				</nav>
			</div>
	</header>
	<div class="container">
		@yield('content')
	</div>
	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('assets/admin/plugins/fastclick/fastclick.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/admin/dist/js/app.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
	<!-- lightgallery -->
	<script src="{{ asset('assets/plugins/lightgallery/js/lightgallery.min.js') }}"></script>
	<!-- Script -->
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>