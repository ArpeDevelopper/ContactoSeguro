<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntosRuta extends Model
{
	protected $primaryKey = 'idPuntoRuta';
    protected $table = "puntosruta";
    public $timestamps = false;
    protected $fillable = ['idPuntoRuta','ubicacion','fecha','idRuta'];
}
