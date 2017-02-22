@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Contactos de Juan Cruz</h2>
        </div>
    </div>

    <hr>
    <div class="row text-center">
        <div class="col-md-3" style="padding-left: 5%;padding-right: 5%;">
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
        </div>
        <div class="col-md-9" style="border-left: solid #eee 1px">
            <div class="row">
                <div class="col-md-4">
                    <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                        <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                        <h2>Contacto1</h2>
                        <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                        <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                        <h2>Contacto 2</h2>
                        <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                        <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                        <h2>Contacto 3</h2>
                        <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')