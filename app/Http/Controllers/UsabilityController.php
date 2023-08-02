<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Http;

class UsabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkSessionTimeout($request);
        //return $request->session()->get('last_activity');
        return view('usabilities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->checkSessionTimeout($request);
        return view('usabilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'name_usability' => $request->name_usability,
            'description_usability' => $request->description_usability,
            'position_usability' => empty($request->position_usability) ? 0 : $request->position_usability,
        ];
        $respuesta = $http -> post('usability',$body);
        // Verificar si existe el campo "message" en la respuesta
        if (property_exists($respuesta, 'response')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta -> message;
            return redirect()->route('usabilities.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('usabilities.index')->with('error',json_encode($message));
        }
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
        $response = $http -> get('usability/'.$id);
        return view('usabilities.edit',compact('response','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'name_usability' => $request->name_usability,
            'description_usability' => $request->description_usability,
            'position_usability' => empty($request->position_usability) ? 0 : $request->position_usability,
        ];
        $respuesta = $http -> upd('usability/'.$id,$body);
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'El usability de '.$respuesta -> name_usability.' actualizo correctamente su datos';
            return redirect()->route('usabilities.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('usabilities.index')->with('error',json_encode($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $this->checkSessionTimeout($request);
        $http = new Http();
        $respuesta = $http->del('usability/' . $id);

        if (!property_exists($respuesta, 'error')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('usabilities.index')->with('success', $success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $error = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('usabilities.index')->with('error', $error);
        }
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
