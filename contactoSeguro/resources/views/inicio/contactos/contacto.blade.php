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
                <div class="col-md-3">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-map-marker"></span> Ubicacion</p>
                </div>
                <div class="col-md-7">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-random"></span> <b>Actividad:</b> Durmiendo</p>
                </div>
                <div class="col-md-2">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-calendar"></span> Hoy</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.635809008251!2d-89.62469438558404!3d20.967135695256214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56715334a60779%3A0x770c2989366a0b5f!2sCatedral+de+M%C3%A9rida!5e0!3m2!1ses-419!2smx!4v1487782943323" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')