<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;

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
	    return view('inicio/usuario/welcome')->with("active","inicio");
	}
    
}	