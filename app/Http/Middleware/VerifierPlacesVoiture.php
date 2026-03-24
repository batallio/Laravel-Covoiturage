<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Voiture;

class VerifierPlacesVoiture
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $vehiculeId = $request->route('vehicule');

        $voiture = Voiture::find($vehiculeId);

        if ($voiture && $voiture->nb_places >= 8) {
            return back()->with('error_bus', 'visualisation d bus en cours');
        }

        return $next($request);
    }
}
