<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
	protected $primaryKey = 'idUbicacion';
    protected $table = "ubicaciones";
    public $timestamps = false;
    protected $fillable = ['idUbicacion','ubicacion','fecha','idUsuario'];
}
