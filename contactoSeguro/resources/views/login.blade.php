@include('template.arriba')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
                <h2> Iniciar sesión</h2>
                <h3>Escriba su nombre de usuario o correo electrónico para poder ingresar a su cuenta <b>Contacto Seguro</>.</h3>
        </div>
    </div>

    <hr>
    <div class="row text-left">
        <div style="padding-left: 5%;padding-right: 5%;border-right: solid 1px #eee;" class="col-md-8">
          <?php
              if(isset($mensaje)){
                ?>
                <div class="alert alert-{{$mensaje['class']}}">{{$mensaje['mensaje']}}</div>
              <?php
              }
            ?>
           <form method="POST" action="{{action('Auth\AuthController@postLogin')}}">
           {{csrf_field()}}
                <label>Nombre de usuario o correo</label>
               <input required="" class="form-control" type="text" name="usuario" placeholder="Nombre de usuario o correo">
               <br>
               <label>Contraseña</label>
               <input required="" placeholder="Contraseña" class="form-control" type="password" name="password" >
               <br>
               <a href="">¿Olvidó su contraseña?</a>
               <br>
               <div class="text-center">
                    <!--<input class="form-control" type="checkbox" name="recordar" ><i>Mantenerme conectado</i>!-->
                    <br>
                    <br>
                    <?php //<a class="btn btn-success" href="{{url('inicio/mi-cuenta')}}">Iniciar sesión</a> ?>
                    <input type="submit" name="entrar" value="Iniciar sesión" class="btn btn-success">
                    o 
                    <a class="btn btn-info" href="{{url('cuenta/crear')}}">Crear cuenta</a>
               </div>
           </form>
        </div>
        <div class="col-md-4 text-center">
             <span style="font-size: 50px;" class="glyphicon glyphicon-lock" aria-hidden="true"> </span> 
             <span style="padding:5px;font-size: 50px;" class="glyphicon glyphicon-home" aria-hidden="true"> </span> 
             <span style="font-size: 50px;" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            <h2>www.contacto-seguro.com</h2>
            <h3>Un lugar en el que tendrá acceso a todos los servicios que ofrece Contacto Seguro.</h3>
        </div>
    </div>
</div>

@include('template.abajo')