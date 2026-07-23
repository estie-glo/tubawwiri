<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Program;
use App\Models\Report;
use App\Models\Resource;
use App\Models\ActionDomain;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur admin (si pas déjà présent)
        User::updateOrCreate(
            ['email' => 'admin@tubawwiri.org'],
            [
                'name' => 'Administrateur TBW',
                'password' => bcrypt('changeme123'),
                'role' => 'admin',
            ]
        );

        // Créer un utilisateur editor
        User::updateOrCreate(
            ['email' => 'editor@tubawwiri.org'],
            [
                'name' => 'Éditeur TBW',
                'password' => bcrypt('editor123'),
                'role' => 'editor',
            ]
        );

        // Créer quelques domaines d'action
        ActionDomain::factory()->count(3)->create([
            'is_published' => true,
        ]);

        // Créer quelques programmes
        Program::factory()->count(5)->create([
            'is_published' => true,
        ]);

        // Créer quelques rapports
        Report::factory()->count(5)->create([
            'is_published' => true,
        ]);

        // Créer quelques ressources
        Resource::factory()->count(10)->create([
            'is_published' => true,
        ]);

        // Optionnel : marquer certaines ressources comme non publiées pour tester les filtres
        Resource::factory()->count(3)->create([
            'is_published' => false,
        ]);
    }
}