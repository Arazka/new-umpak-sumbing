<?php

namespace Database\Factories;

use App\Models\Desa;
use App\Models\PariwisataDesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'foto' => 'desa/test.jpg',
            'nama_desa' => $faker->unique()->city,
            'sejarah' => $faker->paragraph(3),
            'foto_kawasan' => 'desa_geo_map/test.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Desa $desa) {
            PariwisataDesa::factory(3)->create(['desa_id' => $desa->id]);
        });
    }
}
