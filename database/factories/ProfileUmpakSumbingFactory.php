<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileUmpakSumbingFactory extends Factory
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
            'sejarah' => $faker->paragraph(4),
            'misi' => $faker->paragraph(1),
            'visi' => $faker->paragraph(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
