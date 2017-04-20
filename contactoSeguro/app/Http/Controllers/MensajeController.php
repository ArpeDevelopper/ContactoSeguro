<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;

class MensajeController extends Controller
{
    var $context;

    public function listaContactosMensajes() {
    	$idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bo = new BusinessObject($context);
        $listaContactos = $bo->listarContactosPrimerNivel();
	    return view('inicio/usuario/mensajes')->with("active","mensajes")->with("listaContactos",$listaContactos);
	}

	public function listarMensajesContacto($idc) {
    	$idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $context["idUsuarioContacto"]= $idc;
        $bo = new BusinessObject($context);
        $listaContactos = $bo->listarContactosPrimerNivel();
        $mensajes = $bo->listarMensajesUsuarioContacto();

        $bo->context["idUsuario"]= $idc;
        $contactoMensaje = $bo->obtenerLogin();
	    return view('inicio/usuario/mensajes')->with("active","mensajes")->with("mensajes",$mensajes)->with("listaContactos",$listaContactos)->with("idc",$idc)->with("contactoMensaje",$contactoMensaje);
	}

	public function enviarMensaje(Request $r) {
		$context = $r->all();//guardamos los datos enviados por post en una variable

    	$idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bo = new BusinessObject($context);
        $res = $bo->enviarMensaje();
        if($res){
		    return redirect()->action("MensajeController@listarMensajesContacto",["idc"=>$context["idUsuarioContacto"]]);
		}else{
		    //return redirect()->back();

		}
	}
    
}	