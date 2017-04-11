@include('template.arribaUsuario')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
                <h2><span class="glyphicon glyphicon-user"></span> Agregar un nuevo contacto</h2>
        </div>
    </div>

    <hr>
    <div class="row text-left">
        <div style="padding-left: 5%;padding-right: 5%;border-right: solid 1px #eee;" class="col-md-8">
           <form method="post" action="{{action('UsuarioController@buscarContacto')}}">
           {{csrf_field()}}
              <label>Nombre de usuario:</label>
              <div class="input-group">
                
                  <input class="form-control" type="text" name="nickname" placeholder="Nombre de usuario" value="">
                  <div class="input-group-btn">
                    <button  class="btn btn-info" type="submit" name="" ><span class="glyphicon glyphicon-search"></span></button>
                  </div>
              </div>
            </form>
            <form method="post" action="{{action('NotificacionController@enviarSolicitud')}}">
            {{csrf_field()}}
            <input type="hidden" name="usuario" value="{{Auth::user()->idUsuario}}">
               <br>
               <label>Usuarios encontrados:</label>
               <table class="table table-hover">
                 <tr>
                   <th></th>
                   <th>Nombre de usuario</th>
                 </tr>
                 <?php
                 if(isset($contacto) && $contacto!=null){
                      ?>
                      <tr>
                        <td><input class="" type="checkbox" name="idUsuario[]" value="{{$contacto['idUsuario']}}"></td>
                        <td>{{$contacto["nickname"]}}</td>
                      </tr>
                    <?php
                 }//fin if 
                 else{
                  ?>
                      <tr>
                        <td class="danger" colspan="2">No existe un contacto con ese nombre</td>
                      </tr>
                 <?php
                 } 

                 /*<tr>
                   <td><input class="" type="checkbox" name="idUsuario[]"></td>
                   <?php
                   if (isset($_GET['nomUsuario'])) {
                     echo '<td>'.$_GET['nomUsuario'].'</td>';
                   }else{
                     echo '<td>Pedro897</td>';
                   }
                   ?>
                   
                 </tr>*/
                 ?>
                 
               </table>
               <br>
               
               <div class="text-center">
                    <br>
                    <br>
                    <button  class="btn btn-success" type="submit" name="" >Enviar solicitud</button>
                    <?php //<a class="btn btn-success" href="{{url('contactos')}}">Enviar solicitud</a> ?>
                    <br>
                    <br>
               </div>
           </form>
        </div>
        <div class="col-md-4 text-center">
             <span style="font-size: 50px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span> 
             
            <h2>¿Qué es un contacto en <b>Contacto Seguro</b>?</h2>
            <h3>Es una cuenta que contiene información, esto quiere decir que si un amigo o familiar tiene una cuenta en <b>Contacto Seguro</b>, tu lo podrías buscar por medio de su <b>Nombre de usuario</b> y posteriormente enviarle una solicitud. De esta forma podrán estar al pendiente de sus actividades.</h3>
        </div>
    </div>
</div>

@include('template.abajo')