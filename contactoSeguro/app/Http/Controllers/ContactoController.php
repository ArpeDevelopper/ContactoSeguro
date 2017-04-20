<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    var $context;

    public function listarContactosPrimerNivel() {
    	$idUsuario = Auth::user()->idUsuario;
        $context["idUsuario"]= $idUsuario;
        $bo = new BusinessObject($context);
        $contactos = $bo->listarContactosPrimerNivel();
	    return view('inicio/usuario/contactos')->with("lc", $contactos)->with("active","contactos");
	}

	public function mostrarDetalleContacto($id) {
        $context["idUsuario"]= $id;
        date_default_timezone_set('America/Merida');
        $dateTime = getDate();
        if(count($dateTime["mon"])==1){
            $mes = '0'.$dateTime["mon"];
        }else{
            $mes = $dateTime["mon"];
        }
        $context["fecha"] = $dateTime['year']."-".$mes."-".$dateTime['mday'];
        $context["hora"] = $dateTime['hours'].":".$dateTime['minutes'].":".$dateTime['seconds'];
        

        $bo = new BusinessObject($context);
        $contacto = $bo->obtenerLogin();
        $evento = $bo->obtenerEventoFecha();
        $ultimaUbicacion = $bo->obtenerUltimaUbicacionUsuario();

		return view('inicio/contactos/contacto')->with("active","contactos")->with("contacto",$contacto)->with("eventoActual",$evento)->with("ultimaUbicacion",$ultimaUbicacion);
	}

    public function listarContactosSegundoNivel($id) {
        $context["idUsuario"]= $id;
        $context["idPersona"]= $id;
        $bo = new BusinessObject($context);
        $contacto = $bo->obtenerPersona();
        $contactos = $bo->listarContactosPrimerNivel();
        return view('inicio/contactos/contactos')->with("active","")->with("lc",$contactos)->with("contacto",$contacto);
    }
    
}	