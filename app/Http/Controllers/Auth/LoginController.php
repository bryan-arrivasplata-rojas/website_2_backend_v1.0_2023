<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $http = new Http();
        $respuesta = $http->get('user/login/'.$credentials['email']);
        
        if (isset($respuesta->message)) {
            // Autenticación fallida, redirigir al formulario de inicio de sesión
            return redirect()->route('home')->with('response', $respuesta->message);
        } else {
            if ($credentials['password']===$respuesta->password) {
                // Autenticación exitosa, guardar sesión
                session(['user_id' => $respuesta->idUser]); // Guardar el ID del usuario en la sesión
                session()->put('email', $respuesta->email); // Guardar el EMAIL del usuario en la sesión
                session()->put('last_activity', time());
                if (session()->has('redirect_url')) {
                    $redirectUrl = session('redirect_url');
                    session()->forget('redirect_url'); // Eliminar la URL guardada de la sesión
                    return redirect()->to($redirectUrl); // Redirigir al usuario a la URL guardada
                } else {
                    return redirect()->route('home'); // Si no hay URL guardada, redirigir a la página de inicio
                }
            }else{
                return redirect()->route('home')->with('response', 'Contraseña incorrecta');
            }
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        session()->forget('email');
        session()->forget('last_activity');
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio u otra página después de cerrar sesión
        return redirect('/');
    }
}
