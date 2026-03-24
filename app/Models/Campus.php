<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['description', 'adresse', 'type'];

    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'frequentes', 'campus_id', 'employe_id');
    }

    // Trips starting from this campus
    public function trajetsDepart()
    {
        return $this->hasMany(Trajet::class, 'campus_depart_id');
    }

    // Trips arriving at this campus
    public function trajetsArrivee()
    {
        return $this->hasMany(Trajet::class, 'campus_arrivee_id');
    }
}
