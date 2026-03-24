<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Employe;

class VerifierCampusEmploye
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

        if ($employe && $employe->campuses()->count() == 0) {
            return redirect()->route('employes.index')
                ->with('error', 'employe appartient a aucun campus');
        }

        return $next($request);
    }
}
