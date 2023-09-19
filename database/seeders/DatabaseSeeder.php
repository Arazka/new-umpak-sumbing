<?php

namespace Database\Seeders;
use database\factories\UserFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Desa;
use App\Models\Kawasan;
use App\Models\Berita;
use App\Models\ProfileUmpakSumbing;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(3)->create();
        //Desa::factory(7)->create();
        //Kawasan::factory(10)->create();
        //Berita::factory(10)->create();
        //ProfileUmpakSumbing::factory(1)->create();
    }
}
