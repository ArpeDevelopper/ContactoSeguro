<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with("active","inicio");
});

Route::get('cuenta/crear', function () {
    return view('crearCuenta')->with("active","cuentaNueva");
});

Route::get('login', function () {
    return view('login')->with("active","login");
});

Route::get('inicio/mi-cuenta', 'UsuarioController@mostrarInicio');

Route::get('contactos', function () {
    return view('inicio/usuario/contactos')->with("active","contactos");
});
Route::get('contactos/crear', 'UsuarioController@mostrarFormularioBuscar');

Route::get('mensajes', function () {
    return view('inicio/usuario/mensajes')->with("active","mensajes");
});

Route::get('actividades', function () {
    return view('inicio/usuario/actividades')->with("active","");
});

Route::get('eventos', function () {
    return view('inicio/usuario/eventos')->with("active","");
});
Route::get('eventos/crear', function () {
    return view('inicio/usuario/formularioEvento')->with("active","");
});

Route::get('contacto/{id}', function () {
    return view('inicio/contactos/contacto')->with("active","contactos");
});

Route::get('mensajes/{id}', function () {
    return view('inicio/contactos/mensajes')->with("active","mensajes");
});

Route::get('actividades/{id}', function () {
    return view('inicio/contactos/actividades')->with("active","");
});

Route::get('eventos/{id}', function () {
    return view('inicio/contactos/eventos')->with("active","");
});

Route::get('contactos/{id}', function () {
    return view('inicio/contactos/contactos')->with("active","");
});

//ruta para crear un usuario
Route::post('crear/usuario', 'PersonaController@crearPersona');

//ruta para verificar datos del login
Route::post('login/entrar','Auth\AuthController@postLogin');

//ruta para realizar el logout
Route::get('login/salir','Auth\AuthController@logOut');

//ruta para buscar un contacto
Route::post('buscar/contacto','UsuarioController@buscarContacto');

//ruta para enviar solicitud
Route::post('contato/enviar-solicitud','NotificacionController@enviarSolicitud');
Route::get('contato/aceptar-solicitud/{idn}/{ide}/{idu}','NotificacionController@aceptarSolicitud');
