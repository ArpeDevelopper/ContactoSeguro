<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
	protected $primaryKey = 'idMensaje';
    protected $table = "mensaje";
    public $timestamps = false;
    protected $fillable = ['idMensaje','idUsuario','idUsuarioContacto','mensaje','fecha','estado'];
}
