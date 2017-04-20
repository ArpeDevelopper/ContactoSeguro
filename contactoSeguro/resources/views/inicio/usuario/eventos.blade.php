@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
         <div class="col-md-12 text-center">
            <h2 style="font-size: 25px"><span class="glyphicon glyphicon-bullhorn"></span> Mis eventos</h2>
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
                <div class="col-md-12 text-right">
                    <a class="btn btn-success" href="{{url('eventos/formulario')}}"><span class="glyphicon glyphicon-plus"></span> Crear evento</a>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row">
                <style type="text/css">
                    .fc-day:hover{
                        box-shadow: black 0px 0px 10px;
                        background-color: #6262f666;
                    }
                </style>
                <div class="col-md-12 "><script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/es.js"></script>
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')