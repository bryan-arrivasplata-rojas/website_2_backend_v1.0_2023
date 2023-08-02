<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSessionTimeoutMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session()->has('user_id')) {
            $this->checkSessionTimeout($request);
        }
        
        return $next($request);
    }
    
    public function checkSessionTimeout($request)
    {
        $lastActivity = session()->get('last_activity');
        $sessionTimeout = env('SESSION_DURATION'); // 5 minutos (en segundos)
        if (time() - $lastActivity > $sessionTimeout) {
            // Si ha transcurrido el tiempo de inactividad, cerrar sesión automáticamente
            session()->forget('user_id');
            session()->forget('last_activity');
            $request->session()->regenerateToken();

            // Redirigir a la página de inicio u otra página después de cerrar sesión
            return redirect('/');
        } else {
            // Actualizar el tiempo de actividad de la sesión
            session()->put('last_activity', time());
        }
    }
}
