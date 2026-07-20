<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TeamAccountsSeeder extends Seeder
{
    public function run(): void
    {
        // Remplace les emails ci-dessous par les vraies adresses de Bryan et Sibefeu.
        // Mot de passe temporaire identique pour tous : à changer par chacun au premier login
        // (Filament > cliquer sur son nom en haut à droite > "Edit profile").

        User::updateOrCreate(
            ['email' => 'wandji@tubawwiri.org'],
            [
                'name' => 'Wandji',
                'password' => bcrypt('ChangeMoi2026!'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'bryan@tubawwiri.org'],
            [
                'name' => 'Bryan',
                'password' => bcrypt('ChangeMoi2026!'),
                'role' => 'editor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'sibefeu@tubawwiri.org'],
            [
                'name' => 'Sibefeu',
                'password' => bcrypt('ChangeMoi2026!'),
                'role' => 'editor',
            ]
        );
    }
}
