<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
	protected $primaryKey = 'idAlerta';
    protected $table = "alerta";
    public $timestamps = false;
    protected $fillable = ['idAlerta','idUsuario','fecha','idUsuarioContacto'];
}
