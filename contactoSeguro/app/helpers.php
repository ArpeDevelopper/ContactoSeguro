<?php
use App\businessObject;

function listarNotificaciones($idu){
	$context["idUsuario"] = $idu;
	$bO = new businessObject($context);
	$listaNotificaciones = $bO->listarNotificacionesNoLeidas();
	return $listaNotificaciones;
}