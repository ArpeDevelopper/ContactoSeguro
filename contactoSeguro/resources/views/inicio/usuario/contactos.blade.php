@include('template.arribaUsuario')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Mis contactos</h2>
        </div>
    </div>

    <hr>
    <div class="row text-center">
    <div class="row">
        <div  class="col-md-12 text-right">
            <a style="margin: 10px;" class="btn btn-success" href="{{url('contactos/crear')}}"><span class="glyphicon glyphicon-plus"></span> Agregar contacto</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-4">
                <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                    <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                    <h2>Juan Cruz</h2>
                    <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                    <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                    <h2>Jesus Ross</h2>
                    <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background-color: #eee;border:dotted black;margin: 20px; padding:5px" class="row">
                    <span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>
                    <h2>Juan Vazquez</h2>
                    <h3><a href="{{url('contacto/1')}}">Ver información</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')