@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Contactos de {{$contacto->nombre.' '.$contacto->apellidoPaterno}}</h2>
        </div>
    </div>

    <hr>
    <div class="row text-center">
        <div class="col-md-3" style="padding-left: 5%;padding-right: 5%;">
                    <div class="panel panel-primary">
                        <ul class="list-group text-left">
                            <a  href="{{url('contacto/'.$contacto->idPersona)}}">
                                <li style="color: black" class="btn-info list-group-item">
                                <span class="glyphicon glyphicon-eye-open"></span> Estado
                                </li>
                            </a>
                            
                            <a style="color: black" href="{{url('contactos/'.$contacto->idPersona)}}">
                                <li style="color: black" class="btn-info list-group-item">
                                <span class="glyphicon glyphicon-list"></span> Contactos
                                </li>
                            </a>
                            <a style="color: black" href="{{url('mensajes/'.$contacto->idPersona)}}">
                                <li style="color: black" class="btn-info list-group-item">
                                <span class="glyphicon glyphicon-comment"></span> Enviar mensaje
                                </li>
                            </a>
                        </ul>
                    </div>
        </div>
        <div class="col-md-9" style="border-left: solid #eee 1px">
            
            <?php
                $contador = 1;
                $columnas = 3;
                if (count($lc)>0) {
                foreach ($lc as $contacto) {
                    if ($contador==1) {
                        echo "<div class='row' >";
                    }
                    if ($contacto->idUsuarioContacto!=Auth::user()->idUsuario) {
            ?>
                        <div class="col-md-4" >
                            <div style="margin:10px; background-color: #eee;border:dotted black;padding: 10px; border-radius:15px;" class="row">
                                <?php
                                $fotoUsuario = $contacto->foto; 
                                ?>
                                <img style="border-radius: 50%;" src="<?php echo (($fotoUsuario!='') ? asset('img/fotosPerfil/'.$fotoUsuario) : asset('img/sin_foto.png')); ?>" width="150" height="150">

                                <h2>{{$contacto->nickname}}</h2>
                                <h3>{{$contacto->correo}}</h3>
                                <a class="btn btn-info" href="{{url('mensajes/'.$contacto->idUsuarioContacto)}}">Enviar mensaje</a>
                            </div>
                        </div>
            <?php
                    if ($contador==$columnas) {
                        echo "</div>";
                        $contador=0;
                    }
                    $contador++;
                    }//fin if si es el usuario logueado
                }//fin foreach
            }else{
                echo "<h3>Aún no has agregado contactos.</h3>";
            }

                if ($contador>1 && $contador<$columnas) {
                    echo "</div>";
                }
            ?>

        </div>
    </div>
</div>

@include('template.abajo')