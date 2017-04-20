@include('template.arribaUsuario')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Mi perfil</h2>
        </div>
    </div>

    <hr>
    <div class="row ">
        <form action="{{action('UsuarioController@modificarPerfil')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div style="padding-right: 5%;" class="col-md-3 text-center">
            <img style="border-radius: 50%;" src="<?php echo (($usuario->foto!='') ? asset('img/fotosPerfil/'.$usuario->foto) : asset('img/sin_foto.png')); ?>" width="250" height="250">
            <br/>
            <br/>
            <input class="form-control" type="file" name="foto">
            <br/>
            <br/>
            <input class="btn btn-success" type="submit" name="" value="Modificar">
            
        </div>
        <div class="col-md-9" style="border-left: solid 1px #eee;">
            <div class="row">
                <div class="col-md-4">
                    <label>Nombre:</label>
                    <input required="" class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{$usuario->nombre}}">
                </div>
                <div class="col-md-4">
                    <label>Primer apellido:</label>
                    <input required="" class="form-control" type="text" name="apellidoPaterno" placeholder="Primer apellido" value="{{$usuario->apellidoPaterno}}">
                </div>
                <div class="col-md-4">
                    <label>Segundo apellido:</label>
                    <input required="" class="form-control" type="text" name="apellidoMaterno" placeholder="Segundo apellido" value="{{$usuario->apellidoMaterno}}">
                </div>
            </div>            
            <br/>
            <label>Fecha de nacimiento:</label>
            <input required="" class="form-control" type="date" name="fechaNacimiento" placeholder="aaaa-mm-dd" value="{{$usuario->fechaNacimiento}}">
            <br/>
            <label>Teléfono:</label>
            <input required="" class="form-control" type="text" name="telefono" placeholder="teléfono" value="{{$usuario->telefono}}">
            <hr/>
            <label>Nickname:</label>
            <input required="" class="form-control" type="text" name="nickname" placeholder="Nickname" value="{{$usuarioLogin->nickname}}">
            <br/>
            <label>Correo electrónico:</label>
            <input required="" class="form-control" type="email" name="correo" placeholder="ejemplo@ejemplo.com" value="{{$usuarioLogin->correo}}">
            <br/>
            <label>Contraseña:</label>
            <input class="form-control" type="password" name="password" placeholder="Contraseña" >
        </div>
        </form>
    </div>
</div>

@include('template.abajo')