<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
	protected $primaryKey = 'idNotificacion';
    protected $table = "notificacion";
    public $timestamps = false;
    protected $fillable = ['idNotificacion','fecha','mensaje','estado','idUsuario'];
}
