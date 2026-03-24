<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Employe;

class VerifierVoitureEmploye
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employeId = $request->route('employe');

        $employe = Employe::find($employeId);

        if ($employe && $employe->compterVoitures() == 0) {
            return redirect()->route('employes.ajouter_voiture', $employe->id)
                ->with('error', 'employe ne possede aucune voiture');
        }

        return $next($request);
    }
}
