<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    var $context;

    public function mostrarCalendario(){
    	$idUsuario = Auth::user()->idUsuario;
    	$events = [];

		$context["idUsuario"] = $idUsuario;
		$bo = new BusinessObject($context);
		$listaEventos = $bo->listarEventosUsuario(); 

		foreach ($listaEventos as $evento) {
			$events[] = \Calendar::event(
				$evento->nombre,
				false,
				new \DateTime($evento->fechaInicio.' '.$evento->horaInicio),
				new \DateTime($evento->fechaFin.' '.$evento->horaFInal),
				$evento->idEvento,
				[ //set custom color fo this event
					'color' => '#'.rand(0,999999),
					'url' => url("eventos/formulario/".$evento->idEvento)
				]
		    ); 
		}

		$calendar = \Calendar::addEvents($events)->setOptions([ //set fullcalendar options
				'firstDay' => 1
			])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
		        'viewRender' => 'function() {console.log("Callbacks!");}'
		    ]);; //add an array with addEvents

		    

		return view('inicio/usuario/eventos', compact('calendar'))->with("active","");
    }

    public function obtenerEvento($id){
    	$context["idEvento"] = $id;
    	$bo = new BusinessObject($context);
    	$evento = $bo->obtenerEvento();
    	return view('inicio/usuario/formularioEvento')->with("active","")->with("evento",$evento);
    }


    public function formularioEvento(){
        return view('inicio/usuario/formularioEvento')->with("active","");
    }

    public function crearEvento(Request $r){
        $idUsuario = Auth::user()->idUsuario;
        $context = $r->all();
        $context["idUsuario"] = $idUsuario;
        $bObject = new BusinessObject($context);
        $resultaddo = $bObject->crearEvento();
        if ($resultaddo) {
            return redirect()->action('EventosController@mostrarCalendario');
        }else{
            return back();
        }
    }

    public function modificarEvento(Request $r){
        $context = $r->all();
        $bObject = new BusinessObject($context);
        $resultaddo = $bObject->modificarEvento();
        if ($resultaddo) {
            return redirect()->action('EventosController@mostrarCalendario');
        }else{
            return back();
        }
        
    }

    public function eliminarEvento(Request $r){
        $context = $r->all();
        $bObject = new BusinessObject($context);
        $resultaddo = $bObject->eliminarEvento();

        if ($resultaddo) {
            return redirect()->action('EventosController@mostrarCalendario');
        }else{
            return back();
        }
        
    }
    
}	