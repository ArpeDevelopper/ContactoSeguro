@include('template.arribaUsuario')
<?php
if(isset($evento)){
  $tituloFormulario =" Modificar";
  $action = 'EventosController@modificarEvento';
  $idEvento = $evento['idEvento'];
  $nombre = $evento['nombre'];
  $fechaInicio = $evento['fechaInicio'];
  $fechaFin = $evento['fechaFin'];
  $horaInicio = $evento['horaInicio'];
  $horaFinal = $evento['horaFinal'];
  $ubicacion = $evento['ubicacion'];
  $classBoton = "warning";
  $formEliminar = '<form action="'.action("EventosController@eliminarEvento").'" method="post">
        '.csrf_field().'
        <input type="hidden" name="idEvento" value="'.$idEvento.'">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>';
}else{
  $tituloFormulario =" Crear";
  $action = 'EventosController@crearEvento';
   $idEvento = 0;
  $nombre = "";
  $fechaInicio = date("Y-m-d");
  $fechaFin = date("Y-m-d");
  $horaInicio = "";
  $horaFinal = "";
  $ubicacion = "";
  $classBoton = "success";
  $formEliminar = "";
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
                <h2><span class="glyphicon glyphicon-bullhorn"></span> {{$tituloFormulario}} evento</h2>
        </div>
    </div>

    <hr>
    <div class="row text-left">
        <div style="padding-left: 5%;padding-right: 5%;border-right: solid 1px #eee;" class="col-md-8">
           <form action=" {{ action($action) }}" method="post">
           <input type="hidden" name="idEvento" value="{{$idEvento}}">
            {{csrf_field()}}
                <label>Nombre del evento:</label>
               <input class="form-control" type="text" name="nombre" placeholder="Nombre del evento" value="{{$nombre}}">
               <br>
               <label>Ubicación:</label>
               <input style="visibility: hidden" type="text" name="ubicacion" value="{{$ubicacion}}" id="ubicacionEvento">
               <div>
               <div id="mapa" style="height: 500px;width:100%"></div>
                    <script src="{{ asset('js/maps/coordenadasFormulario.js')}}" ></script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0&callback=initMap"></script>
               </div>
               <br>
               <label>Fecha de inicio:</label>
               <input class="form-control" type="date" name="fechaInicio" value="{{$fechaInicio}}" placeholder="dddd-mm-dd">
               <br>
               <label>Fecha de fin:</label>
               <input class="form-control" type="date" name="fechaFin" value="{{$fechaFin}}" placeholder="dddd-mm-dd">
               <br>
               <label>Hora de inicio (formato 24hrs):</label>
               <input placeholder="hh:mm:ss" class="form-control" type="text" name="horaInicio" value="{{$horaInicio}}">
               <br>
               <label>Hora de fin (formato 24hrs):</label>
               <input placeholder="hh:mm:ss" class="form-control" type="text" name="horaFinal" value="{{$horaFinal}}">
               <div class="text-center">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-{{$classBoton}}" >{{$tituloFormulario}} evento</button>
                    <br>
                    <br>
               </div>
           </form>
           <?php
            echo "<br/>".$formEliminar;
            ?>
        </div>
        <div class="col-md-4 text-center">
             <span style="font-size: 50px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span> 
             
            <h2>¿Qué es un evento en <b>Contacto Seguro</b>?</h2>
            <h3>Es un acontecimiento que realizarás en una determinada fecha. Crear un vento puede servir para alertar a tus contactos de primer nivel cuándo algo extraño suceda durante la duración delevento que creaste.</h3>
        </div>
    </div>
</div>

@include('template.abajo')