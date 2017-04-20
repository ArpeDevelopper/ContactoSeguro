<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    var $context;

    public function buscarContacto(Request $r){
        $context = $r->all();//guardamos los datos enviados por post en una variable
        $bObject = new BusinessObject($context);//creamos objeto bussines object

        $logUnicoN = $bObject->obtenerLoginNicknameDiferente();
        return view('inicio/usuario/formularioContacto')->with("active","")->with("contacto",$logUnicoN);
        
    }

    public function mostrarFormularioBuscar(){
        return view('inicio/usuario/formularioContacto')->with("active","");
    }

    public function mostrarInicio() {
        date_default_timezone_set('America/Merida');
        $idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $dateTime = getDate();
        if(count($dateTime["mon"])==1){
            $mes = '0'.$dateTime["mon"];
        }else{
            $mes = $dateTime["mon"];
        }
        $context["fecha"] = $dateTime['year']."-".$mes."-".$dateTime['mday'];
        $context["hora"] = $dateTime['hours'].":".$dateTime['minutes'].":".$dateTime['seconds'];
        $bo = new BusinessObject($context);
        $evento = $bo->obtenerEventoFecha();
	    return view('inicio/usuario/welcome')->with("active","inicio")->with("eventoActual",$evento);
	}

    public function mostrarPerfil() {
        $idUsuario = Auth::user()->idUsuario;
        $context["idPersona"]= $idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bObject = new BusinessObject($context);
        $usuario = $bObject->obtenerPersona();
        $usuarioLogin = $bObject->obtenerLogin();
        return view('usuario/miPerfil')->with("active","")->with("usuario",$usuario)->with("usuarioLogin",$usuarioLogin);
    }

    public function modificarPerfil(Request $r){
        $context = $r->all();//guardamos los datos enviados por post en una variable
        $idUsuario = Auth::user()->idUsuario;
        $context["idPersona"]= $idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bObject = new BusinessObject($context);//creamos objeto bussines object
        $bObject->modificarLogin();
        $bObject->modificarPersona();
        return redirect()->action("UsuarioController@mostrarPerfil");
    }

    public function actualizarUbicacion(Request $r){
        $context = $r->all();//guardamos los datos enviados por post en una variable+
        $idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bObject = new BusinessObject($context);//creamos objeto bussines 
        $bObject->crearUbicacion();
    }

    
}	