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
                <div class="col-md-12 text-left">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-bullhorn"></span> Eventos</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <img style="width: 100%" src="{{asset('img/calendar.png')}}">
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')