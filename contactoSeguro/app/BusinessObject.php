<?php

namespace App;

use App\Login;
use App\Alerta;
use App\Dia;
use App\DiasRutina;
use App\Evento;
use App\LugaresVisitados;
use App\Mensaje;
use App\Notificacion;
use App\Persona;
use App\PuntosRuta;
use App\Rutas;
use App\Rutinas;
use App\Usuario;
use App\UsuarioContacto;
use App\Archivo;
use App\Ubicacion;

class BusinessObject
{
	var $context;


    public function __construct($c){
    	$this->context = $c;
        date_default_timezone_set('America/Merida');
    }

/**************************Login*****************************************/
    public function listarLogins(){
    	//$estudios = Estudio::all();
        $logins = Login::orderBy("idUsuario","ASC")->get();

    	return $logins;
    }

    public function obtenerLogin(){
    	$login = Login::where("idUsuario",$this->context["idUsuario"])->first();
    	return $login;
    }

    public function obtenerLoginNicknameDiferente(){
        $login = Login::where("nickname",$this->context["nickname"])->first();
        return $login;
    }

    public function obtenerLoginCorreoDiferente(){
        $login = Login::where("correo",$this->context["correo"])->first();
        return $login;
    }

    public function modificarLogin(){
    	
        $password = $this->context["password"];
        if($password==""){
            $login1 = $this->obtenerLogin();
            $password = $login1->password;
        }else{
            $password = bcrypt($this->context["password"]);
        }

        \DB::table('login')->where('idUsuario', '=', $this->context["idUsuario"]) ->update(array('nickname' => $this->context["nickname"], 'correo' => $this->context["correo"], 'password' => $password));

        return true;
    }

    public function cambiarEstadoLogin(){

        \DB::table('login')->where('idUsuario', '=', $this->context["idUsuario"])->update( ['estado' => $this->context["estado"]]);

        return true;
    }

    public function eliminarLogin(){
    	$res = Login::where("idUsuario",$this->context["idUsuario"])->delete();
    	if($res){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function crearLogin(){
    	$login = new Login();
        $login["idUsuario"] = $this->context["idUsuario"];
    	$login["nickname"] = $this->context["nickname"];
        $login["correo"] = $this->context["correo"];
        $login["password"] = $this->context["password"];
    	$login["estado"] = 0;
    	$res = $login->save();
//bcrypt
    	if($res){
    		return true;
    	}else{
    		return false;
    	}
    }
    public function obtenerUltimoLogin(){
        //$logins = Login::all();
        $logins = Login::orderBy("idUsuario","ASC")->get();

        return $logins->last();
    }

    /**************************Personas*****************************************/
    public function listarPersonas(){
        //$estudios = Estudio::all();
        $personas = Persona::orderBy("idPersona","ASC")->get();

        return $personas;
    }

    public function obtenerPersona(){
        $persona = Persona::where("idPersona",$this->context["idPersona"])->first();
        return $persona;
    }

    public function modificarPersona(){
        $foto="";
        if (isset($this->context["foto"])) {
            $foto=$this->context["foto"];
        }
        $persona1 = $this->obtenerPersona();
        if($foto==""){
            $nombreFoto = $persona1->foto;
        }else{
            $fotoArchivoExt = explode(".", $this->context["foto"]->getClientOriginalName());
            $foto_handler=new Archivo($this->context["foto"]->getpathname(),$this->context["foto"]->getClientOriginalName());
            $foto_handler->rutaFinal = '../public/img/fotosPerfil/'.$persona1->foto;
            $foto_handler->eliminarArchivo();

            $nombreFoto = 'usuario_'.$this->context["idPersona"].'.'.$fotoArchivoExt[1];
            $nombreTemporal = '../public/img/fotosPerfil/'.$nombreFoto;
            $foto_handler->rutaFinal = $nombreTemporal;
            $foto_handler->upload();
        }

        \DB::table('persona')->where('idPersona', '=', $this->context["idPersona"]) ->update(array('nombre' => $this->context["nombre"], 'apellidoPaterno' => $this->context["apellidoPaterno"], 'apellidoMaterno' => $this->context["apellidoMaterno"], 'fechaNacimiento' => $this->context["fechaNacimiento"], 'ubicacionCasa' => "", 'telefono' => $this->context["telefono"], 'foto' => $nombreFoto));

        return true;
    }

    public function eliminarPersona(){
        $res = Persona::where("idPersona",$this->context["idPersona"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearPersona(){
        $persona = new Persona();
        $persona["nombre"] = $this->context["nombre"];
        $persona["apellidoPaterno"] = $this->context["apellidoPaterno"];
        $persona["apellidoMaterno"] = $this->context["apellidoMaterno"];
        $persona["fechaNacimiento"] = $this->context["fechaNacimiento"];
        $persona["ubicacionCasa"] = $this->context["ubicacionCasa"];
        $persona["telefono"] = $this->context["telefono"];
        $persona["foto"] = $this->context["foto"];
        
        $res = $persona->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimaPersona(){
        //$personas = Persona::all();
        $personas = Persona::orderBy("idPersona","ASC")->get();
        return $personas->last();
    }

    /**************************Usuarios*****************************************/
    public function listarUsuario(){
        //$estudios = Estudio::all();
        $usuarios = Usuario::orderBy("idUsuario","ASC")->get();

        return $usuarios;
    }

    public function obtenerUsuario(){
        $usuario = Usuario::where("idUsuario",$this->context["idUsuario"])->first();
        return $usuario;
    }

    public function modificarUsuario(){

        \DB::table('usuario')->where('idUsuario', '=', $this->context["idUsuario"]) ->update(array('idPersona' => $this->context["idPersona"]));

        return true;
    }

    public function eliminarUsuario(){
        $res = Usuario::where("idUsuario",$this->context["idUsuario"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearUsuario(){
        $usuario = new Usuario();
        $usuario["idPersona"] = $this->context["idPersona"];
        
        $res = $usuario->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimoUsuario(){
        //$usuarios = Usuario::all();
        $usuarios = Usuario::orderBy("idUsuario","ASC")->get();

        return $usuarios->last();
    }

    /**************************Notificaciones*****************************************/
    public function listarNotificaciones(){
        //$estudios = Estudio::all();
        $notificaciones = Notificacion::orderBy("idNotificacion","ASC")->get();

        return $notificaciones;
    }

    public function obtenerNotificacion(){
        $notificacion = Notificacion::where("idNotificacion",$this->context["idNotificacion"])->first();
        return $notificacion;
    }

    public function modificarNotificacion(){

        \DB::table('notificacion')->where('idNotificacion', '=', $this->context["idNotificacion"]) ->update(array('fecha' => $this->context["fecha"],'mensaje' => $this->context["mensaje"],'estado' => $this->context["estado"],'idUsuario' => $this->context["idUsuario"]));

        return true;
    }

    public function eliminarNotificacion(){
        $res = Usuario::where("idNotificacion",$this->context["idNotificacion"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearNotificacion(){
        $notificacion = new Notificacion();
        $notificacion["fecha"] = $this->context["fecha"];
        $notificacion["mensaje"] = $this->context["mensaje"];
        $notificacion["estado"] = $this->context["estado"];
        $notificacion["idUsuario"] = $this->context["idUsuario"];
        
        $res = $notificacion->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimaNotificacion(){
        //$usuarios = Usuario::all();
        $notificaciones = Notificacion::orderBy("idNotificacion","ASC")->get();

        return $notificaciones->last();
    }

    public function listarNotificacionesNoLeidas(){
        $notificacion = Notificacion::where("estado",0)->where("idUsuario",$this->context['idUsuario'])->get();
        return $notificacion;
    }

    public function cambiarEstadoNotificacion(){
        \DB::table('notificacion')->where('idNotificacion', '=', $this->context["idNotificacion"])->update(array('estado' => 1));

        return true;
    }

    /**************************Usuario cntacto*****************************************/
    public function listarContactosPrimerNivel(){
        $contactosPN = \DB::select('select uc.idUsuarioContacto, p.*, l.nickname, l.correo, l.estado from usuariocontacto uc inner join usuario u on u.idUsuario = uc.idUsuarioContacto inner join persona p on u.idPersona = p.idPersona inner join login l on u.idUsuario = l.idUsuario where uc.idUsuario = ?',[$this->context["idUsuario"]]);
       return $contactosPN;
    }

    public function eliminarContacto(){
        $res = Usuario::where("idUsuarioContacto",$this->context["idUsuarioContacto"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function agregarContacto(){
        $usuarioContacto = new UsuarioContacto();
        $usuarioContacto["idUsuario"] = $this->context["idUsuario"];
        $usuarioContacto["idUsuarioContacto"] = $this->context["idUsuarioContacto"];
        
        $res = $usuarioContacto->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }

    /********************** MENSAJES *************/
    public function listarMensajesUsuarioContacto(){
        //$estudios = Estudio::all();

        $mensajes = \DB::select('select * from mensaje where idUsuario in (?,?) and idUsuarioContacto in (?,?)',[$this->context["idUsuario"],$this->context["idUsuarioContacto"],$this->context["idUsuario"],$this->context["idUsuarioContacto"]]);

        return $mensajes;
    }

    public function obtenerMensaje(){
        $mensaje = Mensaje::where("idMensaje",$this->context["idMensaje"])->first();
        return $mensaje;
    }


    public function CambiarEstadoMensaje(){

        \DB::table('mensaje')->where('idMensaje', '=', $this->context["idMensaje"]) ->update(array('estado' => 0));

        return true;
    }

    public function enviarMensaje(){
        $mensaje = new Mensaje();
        $mensaje["idUsuario"] = $this->context["idUsuario"];
        $mensaje["idUsuarioContacto"] = $this->context["idUsuarioContacto"];
        $mensaje["mensaje"] = $this->context["mensaje"];
        $mensaje["fecha"] = date("Y-m-d");
        $mensaje["estado"] = 0;
        $res = $mensaje->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimoMensaje(){
        //$logins = Login::all();
        $mensajes = Mensaje::orderBy("idMensaje","ASC")->get();

        return $mensajes->last();
    }


    /**************************eventos*****************************************/
    public function listarEventosUsuario(){
        //$estudios = Estudio::all();
        $eventos = Evento::where("idUsuario",$this->context["idUsuario"])->orderBy("idEvento","ASC")->get();

        return $eventos;
    }

    public function obtenerEvento(){
        $evento = Evento::where("idEvento",$this->context["idEvento"])->first();
        return $evento;
    }
    public function obtenerEventoFecha(){
        $evento = Evento::where("fechaInicio", "<=",$this->context["fecha"])->where("fechaFin", ">=",$this->context["fecha"])->where("horaInicio", "<=",$this->context["hora"])->where("horaFinal", ">=",$this->context["hora"])->where("idUsuario",$this->context["idUsuario"])->first();
        return $evento;
    }

    public function modificarEvento(){

        \DB::table('eventos')->where('idEvento', '=', $this->context["idEvento"]) ->update(array('nombre' => $this->context["nombre"], 'ubicacion' => $this->context["ubicacion"], 'fechaInicio' => $this->context["fechaInicio"], 'fechaFin' => $this->context["fechaFin"], 'horaInicio' => $this->context["horaInicio"], 'horaFinal' => $this->context["horaFinal"]));

        return true;
    }


    public function eliminarEvento(){
        $res = Evento::where("idEvento",$this->context["idEvento"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearEvento(){
        $evento = new Evento();
        $evento["idUsuario"] = $this->context["idUsuario"];
        $evento["nombre"] = $this->context["nombre"];
        $evento["ubicacion"] = $this->context["ubicacion"];
        $evento["fechaInicio"] = $this->context["fechaInicio"];
        $evento["fechaFin"] = $this->context["fechaFin"];
        $evento["horaInicio"] = $this->context["horaInicio"];
        $evento["horaFinal"] = $this->context["horaFinal"];
        $res = $evento->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimoEvento(){
        //$logins = Login::all();
        $eventos = Evento::orderBy("idEvento","ASC")->get();

        return $eventos->last();
    }

    /**************************ubicaciones*****************************************/
    public function listarUbicacionesUsuario(){
        //$estudios = Estudio::all();
        $ubicaciones = Ubicacion::where("idUsuario",$this->context["idUsuario"])->orderBy("idUbicacion","ASC")->get();

        return $ubicaciones;
    }

    public function obtenerUbicacion(){
        $ubicacion = Ubicacion::where("idUbicacion",$this->context["idUbicacion"])->first();
        return $ubicacion;
    }

    public function modificarUbicacion(){

        \DB::table('ubicaciones')->where('idUbicacion', '=', $this->context["idUbicacion"]) ->update(array('ubicacion' => $this->context["ubicacion"], 'fecha' => $this->context["fecha"], 'idUsuario' => $this->context["idUsuario"]));

        return true;
    }


    public function eliminarUbicacion(){
        $res = Ubicacion::where("idUbicacion",$this->context["idUbicacion"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearUbicacion(){
        $ubicacion = new Ubicacion();
        $ubicacion["idUsuario"] = $this->context["idUsuario"];
        $ubicacion["fecha"] = $this->context["fecha"];
        $ubicacion["ubicacion"] = $this->context["ubicacion"];
        $res = $ubicacion->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimaUbicacion(){
        //$logins = Login::all();
        $ubicaciones = Ubicacion::orderBy("idUbicacion","ASC")->get();

        return $ubicaciones->last();
    }

    public function obtenerUltimaUbicacionUsuario(){
        //$logins = Login::all();
        $ubicaciones = Ubicacion::where("idUsuario",$this->context["idUsuario"])->orderBy("idUbicacion","ASC")->get();

        return $ubicaciones->last();
    }

    /**************************rutinas*****************************************/
    public function listarRutinasUsuario(){
        $rutinas = \DB::select('select r.*, u.ubicacion from rutinas r inner join ubicaciones u on r.idUbicacion = u.idUbicacion where u.idUsuario = ? order by idRutina asc',[$this->context["idUsuario"]]);

        return $rutinas;
    }

    public function obtenerRutina(){
        $rutina = Rutinas::where("idRutina",$this->context["idRutina"])->first();
        return $rutina;
    }

    public function modificarRutina(){

        \DB::table('rutinas')->where('idRutina', '=', $this->context["idRutina"]) ->update(array('horaInicio' => $this->context["horaInicio"], 'horaFinal' => $this->context["horaFinal"], 'idUbicacion' => $this->context["idUbicacion"]));

        return true;
    }


    public function eliminarRutina(){
        $res = Rutinas::where("idRutina",$this->context["idRutina"])->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function crearRutina(){
        $rutina = new Rutinas();
        $rutina["idUbicacion"] = $this->context["idUbicacion"];
        $rutina["horaInicio"] = $this->context["horaInicio"];
        $rutina["horaFinal"] = $this->context["horaFinal"];
        $res = $rutina->save();
//bcrypt
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerUltimaRutina(){
        //$logins = Login::all();
        $rutinas = Rutinas::orderBy("idRutina","ASC")->get();

        return $rutinas->last();
    }

    public function obtenerDiasRutina(){
        $diasRutina = \DB::select('select d.dia from dias d inner join diasrutina dr on d.idDia = dr.idDia where dr.idRutina = ? order by d.idDia asc',[$this->context["idRutina"]]);

        return $diasRutina;
    }

}
