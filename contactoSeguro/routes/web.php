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
Route::get('/chat', function () {
    return view('chat');
});

Route::get('/', function () {
    return view('welcome')->with("active","inicio");
});

Route::get('cuenta/crear', function () {
    return view('crearCuenta')->with("active","cuentaNueva");
});

Route::get('login', function () {
    return view('login')->with("active","login");
});

Route::post('actualizar/ubicacion', 'UsuarioController@actualizarUbicacion');
Route::get('inicio/mi-cuenta', 'UsuarioController@mostrarInicio');
Route::get('inicio/mi-perfil', 'UsuarioController@mostrarPerfil');
Route::post('inicio/modificar-perfil', 'UsuarioController@modificarPerfil');

Route::get('contactos', 'ContactoController@listarContactosPrimerNivel');
Route::get('contactos/crear', 'UsuarioController@mostrarFormularioBuscar');

Route::get('mensajes', 'MensajeController@listaContactosMensajes');
Route::get('mensajes/{idc}', 'MensajeController@listarMensajesContacto');
Route::post('mensajes/enviar', 'MensajeController@enviarMensaje');


Route::get('eventos', 'EventosController@mostrarCalendario');
Route::get('eventos/formulario/{id}', 'EventosController@obtenerEvento');
Route::post('eventos/modificar', 'EventosController@modificarEvento');
Route::get('eventos/formulario', 'EventosController@formularioEvento');
Route::post('eventos/crear', 'EventosController@crearEvento');
Route::post('eventos/eliminar', 'EventosController@eliminarEvento');

Route::get('contacto/{id}', 'ContactoController@mostrarDetalleContacto');

/*Route::get('mensajes/{id}', function () {
    return view('inicio/contactos/mensajes')->with("active","mensajes");
});*/

/*Route::get('rutinas/{id}', function () {
    return view('inicio/contactos/actividades')->with("active","");
});*/
Route::get('rutinas', 'RutinasController@listarRutinas');
Route::get('rutinas/eliminar/{id}', 'RutinasController@eliminarRutina');

Route::get('eventos/{id}', function () {
    return view('inicio/contactos/eventos')->with("active","");
});

Route::get('contactos/{id}', 'ContactoController@listarContactosSegundoNivel');

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
Route::get('contato/aceptado/{idn}/{ide}/{idu}','NotificacionController@infoSolicitudAceptada');

//calendario
Route::get('calendario', 'EventosController@mostrarCalendario');
