<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
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
            'foto' => 'berita/test.jpg',
            'judul' => $faker->unique()->sentence,
            'deskripsi' => $faker->paragraph(3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
