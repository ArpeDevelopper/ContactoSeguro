<?php 
include_once("../../../app/BusinessObject.php");

	if (isset($_POST["id"])) {
		$context["idPersona"] = $idu;
		$bO = new businessObject($context);
		$fotoUsuario = $bO->obtenerPersona();
		echo $fotoUsuario->foto;
	}
?>