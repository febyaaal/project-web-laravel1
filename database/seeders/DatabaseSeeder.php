<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;
use Ramsey\Uuid\Provider\Node\FallbackNodeProvider;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $faker = \Faker\Factory::create('id_ID');
        
       for ($i=0; $i < 500; $i++) {
        Masyarakat::create([
            'nomor_kk' => $faker->randomNumber(),
            'nomor_ktp' => $faker->randomNumber(),
            'nama' => $faker->name(),
            'alamat' => $faker->address(),
            'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan'])
        ]);
       }
    }
}
