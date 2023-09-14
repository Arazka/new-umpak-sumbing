<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KawasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'foto' => $faker->imageUrl(),
            'nama_kawasan' => $faker->unique()->city,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
