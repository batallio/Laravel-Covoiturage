<?php

namespace App\Models;

use App\Enums\StatutConducteur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    use HasFactory;

    // 1 Employee owns N Voitures
    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

    // N Employees frequent N Campuses (Pivot table: frequentes)
    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'frequentes', 'employe_id', 'campus_id');
    }

    // N Employees are passengers in N Trajets (Pivot table: est_passagers)
    // We must include the extra field 'date_inscription'
    public function trajets()
    {
        return $this->belongsToMany(Trajet::class, 'est_passagers', 'employe_id', 'trajet_id')
            ->withPivot('date_inscription')
            ->withTimestamps();
    }

    // Compter les voitures d’un employé
    public function compterVoitures(): int
    {
        return $this->voitures()->count();
    }

    // Vérifier si l’employé possède des véhicules appartenant à un modèle particulier (ex. : « Ferrari »).
    public function possedeModele($modeleRecherche): bool
    {
        return $this->voitures()->where('modele', 'LIKE', '%' . $modeleRecherche . '%')->exists();
    }

    // Retourner un statut à l’employé selon le nombre de véhicules qu’il possède
    public function statutConducteur(): StatutConducteur
    {
        $nombresVoitures = $this->compterVoitures();

        if ($nombresVoitures === 0) {
            return StatutConducteur::PAS_CONDUCTEUR;
        } else if ($nombresVoitures === 1) {
            return StatutConducteur::CONDUCTEUR;
        } else {
            return StatutConducteur::TRES_ACTIF;
        }
    }
}
