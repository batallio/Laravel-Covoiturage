<?php

namespace App\Enums;

enum StatutConducteur: string
{
    case PAS_CONDUCTEUR = 'Pas conducteur';
    case CONDUCTEUR = 'Conducteur';
    case TRES_ACTIF = 'Conducteur très actif';
}
