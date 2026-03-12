<?php

namespace App\Models;

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
}
