@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-2 text-center">
            <?php
            $fotoUsuario = obtenerFoto($contacto->idUsuario); 
            ?>
            <img style="border-radius: 50%;" src="<?php echo (($fotoUsuario!='') ? asset('img/fotosPerfil/'.$fotoUsuario) : asset('img/sin_foto.png')); ?>" width="150" height="150">
        </div>
        <div class="col-md-10 text-left">
                <h1>{{$contacto->nickname}} </h1>
                <h3><?php echo (($contacto->estado==1) ? "<div class='btn btn-success' style='height:25px;width:20px;border-radius: 50%;'></div> En línea" : "<div class='btn btn-danger' style='height:25px;width:20px;border-radius: 50%;'></div> Ausente"); ?></h3>
        </div>
    </div>

    <hr>
    <div class="row text-center">
    
        <div style="padding-left: 5%;padding-right: 5%;" class="col-md-3">
            <div class="panel panel-primary">
                <ul class="list-group text-left">
                    <a  href="{{url('contacto/'.$contacto->idUsuario)}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-eye-open"></span> Estado
                        </li>
                    </a>
                    
                    <a style="color: black" href="{{url('contactos/'.$contacto->idUsuario)}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-list"></span> Contactos
                        </li>
                    </a>
                    <a style="color: black" href="{{url('mensajes/'.$contacto->idUsuario)}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-comment"></span> Enviar mensaje
                        </li>
                    </a>
                </ul>
            </div>
            
        </div>
        <div class="col-md-9" style="border-left: solid 1px #eee;">
            <div class="row">
                <div class="col-md-3">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-map-marker"></span> Ubicacion</p>
                </div>
                <div class="col-md-6">
                    @if($eventoActual!=null)
                    <p style="font-size: 25px">
                    <span class="glyphicon glyphicon-random"></span> 
                    <b>Actividad:</b> {{$eventoActual->nombre}}</p>
                    @endif
                </div>
                <div class="col-md-3">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-calendar"></span> {{date("d-m-Y H:i:s")}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="ultimaUbicacion" style="visibility: hidden;">
                    @if($ultimaUbicacion!=null)
                    {{$ultimaUbicacion->ubicacion}}
                    @endif
                    </span>
                    <div id="mapa" style="height: 500px;width:100%"></div>
                    <script src="{{ asset('js/maps/coordenadasContacto.js')}}" ></script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0&callback=initMap"></script>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')