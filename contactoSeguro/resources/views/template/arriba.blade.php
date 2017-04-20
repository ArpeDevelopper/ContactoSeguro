<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<?php date_default_timezone_set('America/Merida'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" ></script>
	<script src="{{ asset('password/js/jquery.complexify.js')}}"></script>
	<script src="{{ asset('password/js/script.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('password/css/styles.css')}}" />
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"/>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="{{asset('footer/css/demo.css')}}">
	<link rel="stylesheet" href="{{asset('footer/css/footer-distributed-with-address-and-phones.css')}}">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <title>Contacto Seguro</title>
</head>
<body>
<header>
	<nav class="navbar navbar-default"> 
		<div class="container-fluid"> 
			<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a style="margin-right: 70px" class="navbar-brand" href="{{ url('/') }}"><center><img width="70" height="80" style="top: 0px;position: absolute;border-radius: 0px 0px 90px 90px;background-color: #f8f8f8;" src="{{asset('img/logo.png')}}"> </center></a>
    		</div> 
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
				<ul class="nav navbar-nav"> 
					<li class=" {{ $active=='inicio' ? 'active' : '' }} ">
						<a href="{{ url('/') }}">Inicio</a>
					</li>
					<li class="{{ $active=='cuentaNueva' ? 'active' : '' }}">
						<a href="{{ url('cuenta/crear') }}">Crear cuenta</a>
					</li>
					<li class="{{ $active=='login' ? 'active' : '' }}">
						<a href="{{ url('login') }}">Iniciar Sesión</a>
					</li>
				</ul> 
			</div> 
		</div> 
	</nav>
</header>

    