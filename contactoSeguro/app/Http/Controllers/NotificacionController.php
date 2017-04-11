<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;

class NotificacionController extends Controller
{
    var $context;

    public function enviarSolicitud(Request $r){
        $context = $r->all();//guardamos los datos enviados por post en una variable
        $contextUsuario["idUsuario"] = $context["usuario"];
        $bObject1 = new BusinessObject($contextUsuario);//creamos objeto bussines object
        $usuarioQueEnvia = $bObject1->obtenerLogin();

        $bObject = new BusinessObject($context);//creamos objeto bussines object
        foreach ($context["idUsuario"] as $idu) {
        	$bObject->context["fecha"] = date("Y-m-d");
	        $bObject->context["mensaje"] = '{"mensaje": "¡'.$usuarioQueEnvia->nickname.' quiere que seas parte de sus contactos de primer nivel!, haz clic si deseas aceptarlo","class": "info","enlace": "NotificacionController@aceptarSolicitud","emisor":"'.$usuarioQueEnvia->idUsuario.'"}';
	        $bObject->context["estado"] = 0;
	        $bObject->context["idUsuario"] = $idu;
        }
        
        $res = $bObject->crearNotificacion();
        return view('inicio/usuario/formularioContacto')->with("active","")->with("mensaje", array("class"=>"succes","mensaje"=>"Solicitud enviada con éxito"));
        
    }

    public function aceptarSolicitud($idn,$ide,$idu){
        
        
    }
    
}	