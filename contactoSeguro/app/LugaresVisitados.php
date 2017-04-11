<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LugaresVisitados extends Model
{
	protected $primaryKey = 'idLugarVisitado';
    protected $table = "lugaresvisitados";
    public $timestamps = false;
    protected $fillable = ['idLugarVisitado','ubicacion','fecha','horaInicio','horaFinal','idRuta'];
}
