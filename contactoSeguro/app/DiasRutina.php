<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiasRutina extends Model
{

    protected $table = "diasrutina";
    public $timestamps = false;
    protected $fillable = ['idRutina','idDia'];
}
