<?php
use App\businessObject;

function listarNotificaciones($idu){
	$context["idUsuario"] = $idu;
	$bO = new businessObject($context);
	$listaNotificaciones = $bO->listarNotificacionesNoLeidas();
	return $listaNotificaciones;
}

function obtenerFoto($idu){
	$context["idPersona"] = $idu;
	$bO = new businessObject($context);
	$fotoUsuario = $bO->obtenerPersona();
	return $fotoUsuario->foto;
}

function obtenerDiasRutina($idr){
	$context["idRutina"] = $idr;
	$bO = new businessObject($context);
	$dias = $bO->obtenerDiasRutina();
	return $dias;
}