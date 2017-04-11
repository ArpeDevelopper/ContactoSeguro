<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessObject;

class PersonaController extends Controller
{
    var $context;

    public function crearPersona(Request $r){
    	$context = $r->all();//guardamos los datos enviados por post en una variable
    	$bObject = new BusinessObject($context);//creamos objeto bussines object

        $logUnicoN = $bObject->obtenerLoginNicknameDiferente();
        $logUnicoC = $bObject->obtenerLoginCorreoDiferente();
        if($logUnicoN!=null){
            return view("/crearCuenta")->with("mensaje",array("class"=>"danger","mensaje"=>"El nombre de usuario ya existe, prueba con un nombre diferente"))->with("active","cuentaNueva");
        }
        if($logUnicoC!=null){
            return view("/crearCuenta")->with("mensaje",array("class"=>"danger","mensaje"=>"El correo electrónico ya se encuentra registrado, prueba con otro correo"))->with("active","cuentaNueva");
        }

        //ponemos las variables por default
        $bObject->context["nombre"] = "";
        $bObject->context["apellidoPaterno"]= "";
        $bObject->context["apellidoMaterno"]= "";
        $bObject->context["fechaNacimiento"]= date("Y-m-d");
        $bObject->context["ubicacionCasa"]= "";
        $bObject->context["telefono"]= "";
        $bObject->context["foto"]= "";
    	$res = $bObject->crearPersona();
        if($res){
            $ultimaPersona = $bObject->obtenerUltimaPersona();
            $bObject->context["idPersona"] = $ultimaPersona->idPersona;
            $res1 = $bObject->crearUsuario();

            if($res1){
                $ultimoUsuario = $bObject->obtenerUltimoUsuario();
                $bObject->context["idUsuario"] = $ultimoUsuario->idUsuario;
                $bObject->context["password"] = bcrypt($bObject->context["password"]);
                $res2 = $bObject->crearLogin();

                if($res2){
                    return view("/login")->with("mensaje",array("class"=>"success","mensaje"=>"Cuenta creada con éxito"))->with("active","login");
                }else{
                    return view("/crearCuenta")->with("mensaje",array("class"=>"danger","mensaje"=>"Ocurrió un error"))->with("active","cuentaNueva");
                }
            }else{
                return view("/crearCuenta")->with("mensaje",array("class"=>"danger","mensaje"=>"Ocurrió un error"))->with("active","cuentaNueva");
                
            }
        }else{
            return view("/crearCuenta")->with("mensaje",array("class"=>"danger","mensaje"=>"Ocurrió un error"))->with("active","cuentaNueva");
            
        }
        

    	
    }

    public function testPersona(){
        
    }
    
}	