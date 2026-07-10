<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TubawwiriSeeder::class,
        ]);

        // Compte admin Filament par défaut (à changer après le premier login)
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@tubawwiri.org'],
            [
                'name' => 'Administrateur TBW',
                'password' => bcrypt('changeme123'),
            ]
        );
    }
}
