@include('template.arribaUsuario')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-left">
                <h2><span class="glyphicon glyphicon-bullhorn"></span> Crear un nuevo evento</h2>
        </div>
    </div>

    <hr>
    <div class="row text-left">
        <div style="padding-left: 5%;padding-right: 5%;border-right: solid 1px #eee;" class="col-md-8">
           <form>
                <label>Nombre del evento:</label>
               <input class="form-control" type="text" name="nomEvento" placeholder="Nombre del evento">
               <br>
               <label>Ubicación:</label>
               <div>
               <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3725.3225719718157!2d-89.5656053!3d20.9797029!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1487790299873" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
               <br>
               <label>Fecha del evento:</label>
               <input class="form-control" type="date" name="fecha" >
               <br>
               <label>Hora de inicio (formato 24hrs):</label>
               <input placeholder="hh:mm:ss" class="form-control" type="text" name="horaInicio" >
               <br>
               <label>Hora de fin (formato 24hrs):</label>
               <input placeholder="hh:mm:ss" class="form-control" type="text" name="horaFin" >
               <div class="text-center">
                    <br>
                    <br>
                    <a class="btn btn-success" href="{{url('eventos')}}">Crear evento</a>
                    <br>
                    <br>
               </div>
           </form>
        </div>
        <div class="col-md-4 text-center">
             <span style="font-size: 50px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span> 
             
            <h2>¿Qué es un evento en <b>Contacto Seguro</b>?</h2>
            <h3>Es un acontecimiento que realizarás en una determinada fecha. Crear un vento puede servir para alertar a tus contactos de primer nivel cuándo algo extraño suceda durante la duración delevento que creaste.</h3>
        </div>
    </div>
</div>

@include('template.abajo')