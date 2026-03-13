<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Voiture::all();
        return $vehicules;
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
        $new_vehicule = $request->validate([
            'modele' => 'required|string|max:255',
            'nb_places' => 'required|integer|min:1',
            'employe_id' => 'required|exists:employes,id',
        ]);
        Voiture::create($new_vehicule);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Voiture::findOrFail($id);
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
        $vehicule = Voiture::findOrFail($id);
        $updated_data = $request->validate([
            'modele' => 'required|string|max:255',
            'nb_places' => 'required|integer|min:1',
            'employe_id' => 'required|exists:employes,id',
        ]);
        $vehicule->update($updated_data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Voiture::findOrFail($id);
        $vehicule->delete();
    }

    public function voituresSpacieuses()
    {
        $vehicules = Voiture::where('nb_places', '>=', 4)->with('employe')->get();
        return $vehicules;
    }

    public function rechercherParModele(Request $request)
    {
        $recherche = $request->input('q'); // (?q=Ferrari)

        $vehicules = Voiture::where('modele', 'LIKE', '%' . $recherche . '%')
            ->with('employe')
            ->get();

        return $vehicules;
    }
}
