<?php

namespace App;

use App\Login;
use App\Alerta;
use App\Dia;
use App\DiasRutina;
use App\Evento;
use App\LugaresVisitados;
use App\Mnesaje;
use App\Notificacion;
use App\Persona;
use App\PuntosRuta;
use App\Rutas;
use App\Rutinas;
use App\Usuario;
use App\UsuarioContacto;

class BusinessObject
{
	var $context;

    public function __construct($c){
    	$this->context = $c;
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

        \DB::table('persona')->where('idPersona', '=', $this->context["idPersona"]) ->update(array('nombre' => $this->context["nombre"], 'apellidoPaterno' => $this->context["apellidoPaterno"], 'apellidoMaterno' => $this->context["apellidoMaterno"], 'fechaNacimiento' => $this->context["fechaNacimiento"], 'ubicacionCasa' => $this->context["ubicacionCasa"], 'telefono' => $this->context["telefono"], 'foto' => $this->context["foto"]));

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
}
