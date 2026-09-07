<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kosxyz.test'],
            ['name' => 'Admin Kos XYZ', 'password' => Hash::make('password')]
        );

        $this->call([
            KamarSeeder::class,
            ArtikelSeeder::class,
            DemoDataSeeder::class,
        ]);
    }
}
