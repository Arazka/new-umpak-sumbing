<?php

namespace Database\Factories;

use App\Models\PariwisataDesa;
use App\Models\Desa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PariwisataDesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PariwisataDesa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'foto' => 'pariwisata_desa/test.jpg',
            'nama_wisata' => $faker->sentence,
            'deskripsi' => $faker->paragraph,
            'desa_id' => function () {
                return Desa::factory()->create()->id;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

