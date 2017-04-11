<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
	protected $primaryKey = 'idRuta';
    protected $table = "rutas";
    public $timestamps = false;
    protected $fillable = ['idRuta','ubicacionPartida','ubicacionDestino','idUsuario'];
}
