<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkSessionTimeout($request);
        //return $request->session()->get('last_activity');
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->checkSessionTimeout($request);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $response = $http -> get('user/'.$id);
        return view('users.edit',compact('response','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $respuesta = $http -> upd('user/'.$id,$body);
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'El usuario '.$respuesta -> idUser.' actualizo correctamente su email a '.$respuesta -> email.' y su password a '.$respuesta->password;
            return redirect()->route('users.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('users.index')->with('error',json_encode($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function checkSessionTimeout(Request $request)
    {
        $lastActivity = session('last_activity');
        $sessionTimeout = env('SESSION_LIFETIME'); // 5 minutos (en segundos)

        if (time() - $lastActivity > $sessionTimeout) {
            session()->put('redirect_url', url()->current());
            // Si ha transcurrido el tiempo de inactividad, cerrar sesión automáticamente
            session()->forget('user_id');
            session()->forget('last_activity');
            $request->session()->regenerateToken();

            // Redirigir a la página de inicio u otra página después de cerrar sesión
            //return redirect('/');
        } else {
            // Actualizar el tiempo de actividad de la sesión
            session()->put('last_activity', time());
        }
    }
}
