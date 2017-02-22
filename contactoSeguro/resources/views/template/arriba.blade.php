<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"  />
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" ></script>
    



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
      			<a class="navbar-brand" href="{{ url('/') }}">Contacto Seguro</a>
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

    