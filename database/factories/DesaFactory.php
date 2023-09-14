<?php

namespace Database\Factories;

use App\Models\Desa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desa::class; // Specify the model class

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
            'nama_desa' => $faker->unique()->city,
            'sejarah' => $faker->paragraph(3),
            'foto_kawasan' => $faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
