<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Http;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkSessionTimeout($request);
        //return $request->session()->get('last_activity');
        return view('profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->checkSessionTimeout($request);
        return view('profiles.create');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $response = $http -> get('profile/'.$id);
        $users = $http -> get('user');
        return view('profiles.edit',compact('response','id','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'name_profile' => $request->name_profile,
            'description_profile' => $request->description_profile,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'idUser' => $request->idUser,
        ];
        $respuesta = $http -> upd('profile/'.$id,$body);
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'El profile de '.$respuesta -> name_profile.' actualizo correctamente su datos';
            return redirect()->route('profiles.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('profiles.index')->with('error',json_encode($message));
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
