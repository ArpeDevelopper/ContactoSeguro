@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2 style="font-size: 25px"><span class="glyphicon glyphicon-tasks"></span> Mis rutinas</h2>
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
        <div class="col-md-9" style="border-left: solid 1px #eee;">
            
            <div class="row">
                <div class="col-md-12 ">
                    <table class="table table-hover ">
                        <tr class="text-left">
                            
                            <th><span class="glyphicon glyphicon-calendar"></span> Fecha</th>
                            <th><span class="glyphicon glyphicon-time"></span> Horario</th>
                            <th><span class="glyphicon glyphicon-map-marker"></span> Ubicación</th>
                            <th><span class="glyphicon glyphicon-remove"></span> Eliminar</th>
                        <tr>
                        @foreach($listaRutinas as $rutina)
                        <tr class="text-left">
                            
                            <td>
                                <?php 
                                $listaDias = obtenerDiasRutina($rutina->idRutina);
                                $totalDias = count($listaDias);
                                for ($i=0; $i < $totalDias; $i++) { 

                                    echo ($i!=0) ? (($i == $totalDias-1)? " y " : ", ") : "";
                                    
                                    echo $listaDias[$i]->dia;
                                }
                                ?>
                            </td>
                            <td>{{$rutina->horaInicio}} {{$rutina->horaFinal}}</td>
                            <td><button type="button" class="btn btn-info btn-lg verMapa" data-toggle="modal" data-target="#myModal">
                              Ver mapa
                            </button><span style="display: none;" class="ubicacion">{{$rutina->ubicacion}}</span></td>
                            <td><a class="btn btn-danger" href="{{action('RutinasController@eliminarRutina',['id'=> $rutina->idRutina])}}"><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>

            

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ubicación</h4>
                  </div>
                  <div class="modal-body">
                    <div id="mapa" style="height: 500px;width:100%"></div>
                    <script src="{{ asset('js/maps/marcadoresRutinas.js')}}" ></script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0"></script>
                  </div>
                </div>
              </div>
            </div>


        </div>
    </div>
</div>

@include('template.abajo')