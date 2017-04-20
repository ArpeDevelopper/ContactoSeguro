<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;

class NotificacionController extends Controller
{
    var $context;

    public function enviarSolicitud(Request $r){
        date_default_timezone_set('America/Merida');
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
        date_default_timezone_set('America/Merida');
        $context["idNotificacion"] = $idn;
        $context["idUsuario"] = $idu;
        $context["idUsuarioContacto"] = $ide;

        $bo = new BusinessObject($context);
        $usuarioActual = $bo->obtenerLogin();
        $bo->cambiarEstadoNotificacion();
        $bo->agregarContacto();//agregar contacto en el primer usuario

        $bo->context["idUsuario"] = $ide;
        $bo->context["idUsuarioContacto"] = $idu;
        $bo->agregarContacto();//agregar contacto en el segundo contacto

            $bo->context["fecha"] = date("Y-m-d");
            $bo->context["mensaje"] = '{"mensaje": "¡'.$usuarioActual->nickname.' ha aceptado tu Solicitud! Visita su perfil","class": "success","enlace": "NotificacionController@infoSolicitudAceptada","emisor":"'.$usuarioActual->idUsuario.'"}';
            $bo->context["estado"] = 0;
            $bo->context["idUsuario"] = $ide;
        
        $res = $bo->crearNotificacion();

        return redirect()->action("ContactoController@listarContactosPrimerNivel");
        
    }

    public function infoSolicitudAceptada($idn,$ide,$idu){
        $context["idNotificacion"] = $idn;
        $context["idUsuario"] = $ide;

        $bo = new BusinessObject($context);
        $bo->cambiarEstadoNotificacion();

        return redirect()->action("ContactoController@mostrarDetalleContacto",["id"=>$ide]);
        
    }
    
}	