@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2 style="font-size: 25px"><span class="glyphicon glyphicon-comment"></span> Mis mensajes</h2>
        </div>
    </div>
    <hr>
    <div class="row text-center">
    
        <div style="padding-left: 5%;padding-right: 5%;" class="col-md-3">
            <div class="panel panel-primary">
                <ul class="list-group text-left">
                    <a  href="{{url('inicio/mi-cuenta')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-eye-open"></span> Estado
                        </li>
                    </a>
                    <a  href="{{url('rutinas')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-tasks"></span> Rutinas
                        </li>
                    </a>
                    <a style="color: black" href="{{url('mensajes')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-comment"></span> Mensajes            
                        </li>
                    </a>
                    <a  href="{{url('eventos')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-bullhorn"></span> Eventos</li>
                    </a>
                </ul>
            </div>


            
            
        </div>
        <div class="text-left col-md-2" style="border-left: solid 1px #eee;">
            <b>Contactos:</b>
            <br/>
            <ul class="list-group">
                @foreach ($listaContactos as $contacto)

                    <a href="{{action('MensajeController@listarMensajesContacto',['idc'=>$contacto->idUsuarioContacto])}}"><li class="list-group-item" ><b style="
                    <?php echo (($contacto->estado==1) ? "background-color:#008000b3;color:#008000b3;" : "background-color:#f009;color:#f009;"); ?>"
                    >|</b>
                    {{$contacto->nombre.' '.$contacto->apellidoPaterno}} <span>({{$contacto->nickname}})</span>
                    </li></a>
                    
                @endforeach
            </ul>
        </div>
        <div class="col-md-7" style="border-left: solid 1px #eee;">
        <?php
            if (isset($idc)) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-left">{{$contactoMensaje->nickname}}</h4>
                        <div class="bg-info" style=" padding:10px;width: 100%; height: 300px;overflow-y: auto;overflow-x: hidden;">
                            <?php
                                $fotoUsuario = obtenerFoto(Auth::user()->idUsuario);
                                $fotoUsuarioContacto = obtenerFoto($idc);
                                foreach ($mensajes as $mensaje) {
                                    ?>
                                    <div class="row">
                                    <?php
                                    if ($mensaje->idUsuario == Auth::user()->idUsuario) {
                                        ?>
                                        <div class="col-md-11 text-right" style="padding:0px;">
                                        <span class="label label-primary">
                                        {{$mensaje->mensaje}}
                                        </span>
                                        </div>
                                        <div class="col-md-1 text-left" style="padding: 2px;"><img style="border-radius: 50%;" src="<?php echo (($fotoUsuario!='') ? asset('img/fotosPerfil/'.$fotoUsuario) : asset('img/sin_foto.png')); ?>" width="30" height="30"></div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-1 text-right" style="padding:2px;"><img style="border-radius: 50%;" src="<?php echo (($fotoUsuarioContacto!='') ? asset('img/fotosPerfil/'.$fotoUsuarioContacto) : asset('img/sin_foto.png')); ?>" width="30" height="30"></div>
                                        <div class="col-md-11 text-left" style="padding:0px;">
                                        <span class="label label-primary"> {{$mensaje->mensaje}}
                                        </span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <?php
                                }//fin foreach de mensajes
                            ?>
                            
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <form action="{{action('MensajeController@enviarMensaje')}}" method="POST">
                        {{csrf_field()}}
                            <input type="hidden" name="idUsuarioContacto" value="{{$idc}}">
                        <div class="input-group">
                            <textarea name="mensaje" placeholder="Escriba su mensaje aquí..." class="form-control" style="border:1;width: 100%; height: 50px;overflow-y: scroll;"></textarea>
                            <div class="input-group-btn">
                                <input style=" height: 50px;" class="btn btn-success" type="submit" name="" value="Enviar">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-control" style="width: 100%; height: 300px;overflow-y: scroll;"></div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <div class="input-group">
                            <textarea placeholder="Escriba su mensaje aquí..." class="form-control" style="border:1;width: 100%; height: 50px;overflow-y: scroll;"></textarea>
                            <div class="input-group-btn">
                                <input style=" height: 50px;" class="btn btn-success" type="submit" name="" value="Enviar">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }//fin else
        ?>
            
        </div>
    </div>
</div>

@include('template.abajo')