<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioContacto extends Model
{

    protected $table = "usuariocontacto";
    public $timestamps = false;
    protected $fillable = ['idUsuario','idUsuarioContacto'];
}
