<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "login";
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;
    protected $fillable = [
        'idUsuario','nickname', 'correo', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

}
