<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;
use BrainSocket\BrainSocketAppResponse;

class RutinasController extends Controller
{
    var $context;

    public function listarRutinas(){
    	$idUsuario = Auth::user()->idUsuario;
		$context["idUsuario"] = $idUsuario;
		$bo = new BusinessObject($context);
		$listaRutinas = $bo->listarRutinasUsuario();		    

        return view('inicio/usuario/actividades')->with("active","")->with("listaRutinas", $listaRutinas);

    }


    public function eliminarRutina($id){
        $context["idRutina"] = $id;
        $bObject = new BusinessObject($context);
        $resultaddo = $bObject->eliminarRutina();

        if ($resultaddo) {
            return redirect()->action('RutinasController@listarRutinas');
        }else{
            return back();
        }
        
    }
    
}	