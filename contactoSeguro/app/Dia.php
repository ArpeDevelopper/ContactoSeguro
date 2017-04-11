<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
	protected $primaryKey = 'idDia';
    protected $table = "dias";
    public $timestamps = false;
    protected $fillable = ['idDia','dia'];
}
