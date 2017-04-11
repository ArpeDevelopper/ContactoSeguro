<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectTo = '/';



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'correo' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['name'],
            'correo' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logOut()
    {
        //Auth::logout();
        Session::flush();
        return redirect('login')->with('mensaje', array("class"=>"danger","mensaje"=>'Tu sesión ha sido cerrada.'))->with('active', "login");
    }

    public function postLogin(Request $r)
    {
        // Guardamos en un arreglo los datos del usuario.
        $userdata = $r->all();
        $credentials = array('nickname' => $userdata['usuario'], 'password' => $userdata['password']);

        //var_dump(Auth::attempt($credentials));
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($credentials))
        {
            // De ser datos válidos nos mandara a la bienvenida
            return redirect('inicio/mi-cuenta');
            //return redirect()->action('PersonaController@testPersona');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return redirect('login')->with('mensaje', array("class"=>"danger", "mensaje" =>"Tus datos son incorrectos"))->with("active","login")->withInput();
    }

    
}
