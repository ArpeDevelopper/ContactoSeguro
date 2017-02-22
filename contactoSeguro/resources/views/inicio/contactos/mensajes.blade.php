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
            <div class="panel-heading"><span class="glyphicon glyphicon-comment"></span> Mensajes</div>
                <ul style="max-height: 400px;overflow-y: scroll;" class="list-group text-left">
                    <a href="#">
                        <li class=" list-group-item">
                        Juan Cruz</li>
                    </a>
                    <a href="{{url('mensajes/2')}}">
                        <li class="list-group-item">
                        Jesus Ross</li>
                    </a>
                    <a href="{{url('mensajes/3')}}">
                        <li class="list-group-item">
                        Juan Vazquez</li>
                    </a>
                </ul>
            </div>
            
        </div>
        <div class="col-md-9" style="border-left: solid 1px #eee;">
            <div class="row">
                <div class="col-md-3">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-comment"></span> Mensajes</p>
                </div>
                <div class="col-md-9 text-right">
                    <p style="font-size: 25px"><span class="glyphicon glyphicon-calendar"></span> Hoy</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" style="border:1;width: 100%; height: 150px;overflow-y: scroll;"></textarea>
                </div>

                <div class="col-md-12">
                    <br>
                    <div class="input-group">
                        <textarea placeholder="Escriba su mensaje aquí..." class="form-control" style="border:1;width: 100%; height: 50px;overflow-y: scroll;"></textarea>
                        <div class="input-group-btn">
                            <input style=" height: 50px;" class="btn btn-success" type="submit" name="" value="Enviar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.abajo')