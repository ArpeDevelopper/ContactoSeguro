<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;

use WebSocket\Client;

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


    public function publicar() {
        // Do db stuff here
        // Notify all connected brainsocket clients
        $client = new Client("ws://192.168.1.67:8888"); 
        $message = json_decode('{"message":"Notificacion","user_id":18,"user_contact":11,"notificacion":true}');
        $data = array(
            'client' => array(
                'event' => 'notificaciones.usuario_11',
                'data'  => $message
            )
        );
        $client->send(json_encode($data));
        $client->close();
    }

}	