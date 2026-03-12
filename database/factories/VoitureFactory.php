<?php

namespace Database\Factories;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Voiture>
 */
class VoitureFactory extends Factory
{

    protected $model = Voiture::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'modele' => $this->faker->word() . ' ' . $this->faker->randomLetter(),
            'nb_places' => $this->faker->numberBetween(2, 7),
            // Note : L'employe_id sera géré dynamiquement dans le Seeder
        ];
    }
}
