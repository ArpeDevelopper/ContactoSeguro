@include('template.arribaUsuario')

<div class="container-fluid">
    <br>

    <div class="row">
        <div class="col-md-2 text-center">
            <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
        </div>
        <div class="col-md-10 text-left">
                <h1>Juan Cruz </h1>
                <h3>En línea</h3>
        </div>
    </div>
    <br>

    <hr>
    <div class="row text-center">
    
        <div style="padding-left: 5%;padding-right: 5%;" class="col-md-3">
            <div class="panel panel-primary">
                <ul class="list-group text-left">
                    <a  href="{{url('contacto/1')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-eye-open"></span> Estado
                        </li>
                    </a>
                    <a  href="{{url('actividades/1')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-tasks"></span> Actividades
                        </li>
                    </a>
                    <a style="color: black" href="{{url('contactos/1')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-list"></span> Contactos
                        </li>
                    </a>
                    <a  href="{{url('eventos/1')}}">
                        <li style="color: black" class="btn-info list-group-item">
                        <span class="glyphicon glyphicon-bullhorn"></span> Eventos</li>
                    </a>
                </ul>
            </div>
            <label><span class="glyphicon glyphicon-calendar"></span></label>
            <input class="form-control" type="date" name="fecha" value="{{date('Y-m-d')}}">
        </div>
        <div class="col-md-9" style="border-left: solid 1px #eee;">
            <div class="row">
                <div class="col-md-4">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-tasks"></span> Rutinas y actividades</p>
                </div>
                <div class="col-md-8 text-right">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-calendar"></span> Hoy</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <table class="table table-hover ">
                        <tr class="text-left">
                            <th><span class="glyphicon glyphicon-tasks"></span> Actividad</th>
                            <th><span class="glyphicon glyphicon-map-marker"></span> Ubicación</th>
                            <th><span class="glyphicon glyphicon-calendar"></span> Fecha</th>
                            <th><span class="glyphicon glyphicon-time"></span> Horario</th>
                            <th> <span class="glyphicon glyphicon-check"></span> Realizado</th>
                        <tr>
                        <tr class="text-left">
                            <td>Universidad</td>
                            <td>Calle 115 (Circuito Colonias Sur) No. 404 por Calle 50, Santa Rosa, 97279 Mérida, Yuc.</td>
                            <td>Lunes a Viernes</td>
                            <td>16:00 - 21:00</td>
                            <td>Si</td>
                        </tr>
                        <tr class="text-left">
                            <td>Misa</td>
                            <td>Calle 2 No. 282, Col. Melchor Ocampo, Sin Nombre de Col 6, 97165 Mérida, Yuc.</td>
                            <td>Domingos </td>
                            <td>7:00 - 8:00</td>
                            <td>No</td>
                        </tr>
                        <tr class="text-left">
                            <td>Trabajo</td>
                            <td>Calle 60 301 A, Cordemex Revolucion, Cordemex, 97110 Mérida, Yuc.</td>
                            <td>Lunes a Viernes</td>
                            <td>8:00 - 15:00</td>
                            <td>Si</td>
                        </tr>
                        <tr class="text-left">
                            <td>Fiesta en familia</td>
                            <td>Calle 2 No. 282, Col. Melchor Ocampo, Sin Nombre de Col 6, 97165 Mérida, Yuc.</td>
                            <td>Sábado 25 de febrero </td>
                            <td>10:00 - 18:00</td>
                            <td>No</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')