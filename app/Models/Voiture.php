<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{

    use HasFactory;

    // A car belongs to 1 Employee
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    // A car conducts N Trajets
    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }
}
