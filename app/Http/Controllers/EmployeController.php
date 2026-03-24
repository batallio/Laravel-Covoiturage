<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_employe = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
        ]);

        Employe::create($new_employe);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employe = Employe::findOrFail($id);
        return view('employes.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe = Employe::findOrFail($id);
        $updated_data = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:employes,email,' . $employe->id,
        ]);
        $employe->update($updated_data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
    }

    /**
     * Verifica si el empleado posee un modelo de coche específico.
     */
    public function hasModele(Request $request, Employe $employe)
    {
        $request->validate([
            'modele' => 'required|string|max:255',
        ]);

        $modeleRecherche = $request->input('modele');

        $possede = $employe->possedeModele($modeleRecherche);

        $resultat = $possede ? 'YES' : 'NO';

        return redirect()->route('employes.show', $employe->id)
            ->with('resultat', $resultat);
    }
}
