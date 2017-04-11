<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutinas extends Model
{
	protected $primaryKey = 'idRutina';
    protected $table = "rutinas";
    public $timestamps = false;
    protected $fillable = ['idRutina','horaInicio','horaFinal','idRuta'];
}
