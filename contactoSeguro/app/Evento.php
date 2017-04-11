<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	protected $primaryKey = 'idEvento';
    protected $table = "eventos";
    public $timestamps = false;
    protected $fillable = ['idEvento','nombre','ubicacion','fecha','horaInicio','horaFinal','idUsuario'];
}
