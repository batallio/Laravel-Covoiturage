<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employe;
use App\Models\Voiture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // On crée 10 employés
        Employe::factory()
            ->count(10)
            ->create()
            ->each(function ($employe) {
                // Pour chaque employé, on détermine un nombre aléatoire de voitures (entre 0 et 2)
                $nbVoitures = rand(0, 2);

                // S'il possède au moins une voiture, on les crée et on les lie à cet employé
                if ($nbVoitures > 0) {
                    Voiture::factory()
                        ->count($nbVoitures)
                        ->for($employe) // Cette méthode remplit automatiquement employe_id
                        ->create();
                }
            });
    }
}
