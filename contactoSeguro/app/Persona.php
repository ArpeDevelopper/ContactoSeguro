<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $primaryKey = 'idPersona';
    protected $table = "persona";
    public $timestamps = false;
    protected $fillable = ['idPersona','nombre','apellidoPaterno','apellidoMaterno','fechaNacimiento','ubicacionCasa','telefono','foto'];
}
