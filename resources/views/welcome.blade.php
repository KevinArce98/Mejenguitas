<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Oxygen|Signika" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css')}}">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Route::has('login'))
		                    @auth
		                        <li><a href="{{ url('/home') }}">Principal</a></li>
		                    @else
		                        <li><a href="{{ route('login') }}">Iniciar Sesi&oacute;n</a></li>
		                        <li><a href="{{ route('register') }}">Registro</a></li>
		                    @endauth
		            @endif
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="content">
				<h1 id="title">Mejenguitas</h1>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
</body>
</html>