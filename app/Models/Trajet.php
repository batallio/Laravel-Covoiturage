<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function campusDepart()
    {
        return $this->belongsTo(Campus::class, 'campus_depart_id');
    }

    public function campusArrivee()
    {
        return $this->belongsTo(Campus::class, 'campus_arrivee_id');
    }

    public function passagers()
    {
        return $this->belongsToMany(Employe::class, 'est_passagers', 'trajet_id', 'employe_id')
            ->withPivot('date_inscription')
            ->withTimestamps();
    }
}
