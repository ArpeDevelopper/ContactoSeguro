<?php

namespace App;

class Archivo
{
	var $rutaFinal;
	var $rutaTemporal;
	
	function __construct($rutaTemporal,$rutaFinal)
	{
		$this->rutaTemporal=$rutaTemporal;
		$this->rutaFinal=$rutaFinal;	
	}

	function upload()
	{
		move_uploaded_file($this->rutaTemporal,$this->rutaFinal);			
	}

	function eliminarArchivo()
	{
		if(is_file($this->rutaFinal))
		{
			unlink($this->rutaFinal);	 
		}			
	}

	function obtenerExtension()
	{
		$ext = pathinfo($this->rutaTemporal, PATHINFO_EXTENSION);
		//echo $ext;
		return $ext;		
	}
}
