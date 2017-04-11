@include('template.arriba')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
                <h2> Crear una nueva cuenta</h2>
                <h3>La cuenta en <i>contacto-seguro.com</i> le proporciona los mejores servicos de seguridad para usted y sus contactos.</h3>
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
           <form id="registro" method="post" action="{{action('PersonaController@crearPersona')}}">
            {{csrf_field()}}
              <div class="row text">
                <label>Nombre de usuario:</label>
               <input required="" class="form-control" type="text" name="nickname" placeholder="Nombre de usuario">
               <br>
               </div>
               <div class="row email">
               <label>Correo electrónico</label>
               <input required="" id="email" class="form-control" type="email" name="correo" placeholder="ejemplo@ejemplo.com">
               <br>
               </div>
               <div class="row pass password">
               <label>Contraseña</label>
               <input required="" class="form-control inputPassword" id="password1" type="password" name="password" >
               <br>
               </div>
               <div class="row pass">
               <label>Confirmar la contraseña</label>
               <input disabled="true" id="password2" required="" class="form-control" type="password" name="password1" >
               <br>
               </div>

               <script src="{{asset('password/js/bootstrap-strength.js')}}"></script>
                <script>
                $('.inputPassword').bootstrapStrength();
                </script>
               <div class="text-center">
                    <input class="form-control" type="checkbox" name="condiciones" ><i>Acepto los términos y condiciones</i>
                    <br>
                    <br>
                    <input type="submit" name="crearUsuario" value="Crear cuenta" class="btn btn-success">
                    <?php /*<a class="btn btn-success" href="{{url('login')}}">Crear cuenta</a>*/ ?>
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