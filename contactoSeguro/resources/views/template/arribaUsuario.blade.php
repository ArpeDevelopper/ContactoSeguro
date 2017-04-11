<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"  />
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" ></script>
    


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
      			<a class="navbar-brand" href="{{ url('inicio/mi-cuenta') }}">Contacto Seguro</a>
    		</div> 
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
				<ul class="nav navbar-nav"> 
					<li class=" {{ $active=='inicio' ? 'active' : '' }} ">
						<a href="{{ url('inicio/mi-cuenta') }}">Inicio</a>
					</li>
					<li class="{{ $active=='contactos' ? 'active' : '' }}">
						<a href="{{ url('contactos') }}">Contactos</a>
					</li>
					<li class="{{ $active=='mensajes' ? 'active' : '' }}">
						<a href="{{ url('mensajes') }}">Mensajes</a>
					</li>
				</ul> 
				<?php
				$notificaciones = listarNotificaciones(Auth::user()->idUsuario);
				?>
				<ul class="nav navbar-nav navbar-right"> 
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span><span class="badge">{{count($notificaciones)}}</span></a>
			          <ul style="max-height: 400px;overflow: auto;" class="dropdown-menu">
			          	@foreach($notificaciones as $notif)
			          	<?php  //foreach para las notificaciones
			          		$mensajeN = json_decode($notif->mensaje);
			          	?>
			            <a style="text-align:center;text-decoration: none" href="{{action($mensajeN->enlace,[$notif->idNotificacion,$mensajeN->emisor,$notif->idUsuario])}}"><li class="btn-{{$mensajeN->class}}" style="width:250px;padding: 15px;" >{{$mensajeN->mensaje}} </li></a><hr style="margin: 0px;"/>
			         	@endforeach
			          </ul>
			        </li>
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nickname}} <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{url('inicio/mi-cuenta')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mi perfil</a></li>
			            <li><a href="{{action('Auth\AuthController@logOut')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesión</a></li>
			          </ul>
			        </li>
				</ul> 
			</div> 
		</div> 
	</nav>
</header>

    