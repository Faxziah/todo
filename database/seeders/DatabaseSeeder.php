<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Admin',
//             'email' => 'admin@admin.com',
//             'password' => '$2y$12$7Sgzsk5XDhpb1./6APWF5Old2LNmEqUe.qEd8hCXIz5o2e3Qc5G12',
//         ]);
    }
}
