@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Mis contactos</h2>
        </div>
    </div>

    <hr>
    <div class="row text-center">
    <div class="col-md-12">
    <div class="row">
        <div  class="col-md-11 text-right">
            <a style="" class="btn btn-success" href="{{url('contactos/crear')}}"><span class="glyphicon glyphicon-plus"></span> Agregar contacto</a>
        </div>
        <br/>
        <br/>
    </div>
    <?php
        $contador = 1;
        $columnas = 3;
        if (count($lc)>0) {
        foreach ($lc as $contacto) {
            if ($contador==1) {
                echo "<div class='row' >";
            }
    ?>
                <div class="col-md-4" >
                    <a style="text-decoration: none;color: black" href="{{url('contacto/'.$contacto->idUsuarioContacto)}}">
                    <div style="margin:10px; background-color: #eee;border:dotted black;padding: 10px; border-radius:15px;" class="row">
                        <?php
                        $fotoUsuario = $contacto->foto; 
                        ?>
                        <img style="border-radius: 50%;" src="<?php echo (($fotoUsuario!='') ? asset('img/fotosPerfil/'.$fotoUsuario) : asset('img/sin_foto.png')); ?>" width="150" height="150">

                        <h2>{{$contacto->nombre.' '.$contacto->apellidoPaterno}}</h2>
                    </div>
                    </a>
                </div>
    <?php
            if ($contador==$columnas) {
                echo "</div>";
                $contador=0;
            }
            $contador++;
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