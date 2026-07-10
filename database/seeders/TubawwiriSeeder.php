<?php

namespace Database\Seeders;

use App\Models\ActionDomain;
use App\Models\Category;
use App\Models\ImpactStat;
use App\Models\Page;
use Illuminate\Database\Seeder;

class TubawwiriSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Pages institutionnelles =====
        Page::updateOrCreate(['slug' => 'qui-sommes-nous'], [
            'title_fr' => 'Qui sommes-nous',
            'title_en' => 'About us',
            'content_fr' => "<p>Mission : Promouvoir la santé mentale communautaire, renforcer la résilience humaine et accompagner les familles, les enfants, les femmes et les communautés vers un développement durable.</p>
<p>Valeurs : sagesse, dignité, solidarité, résilience, intégrité, innovation, enracinement culturel.</p>",
            'content_en' => "<p>Mission: To promote community mental health, strengthen human resilience and support families, children, women and communities toward sustainable development.</p>",
            'is_published' => true,
        ]);

        Page::updateOrCreate(['slug' => 'notre-approche'], [
            'title_fr' => 'Notre approche',
            'title_en' => 'Our approach',
            'content_fr' => "<p>La méthode CAVAMIS est une approche de conseils, astuces de vie, accompagnement communautaire, prévention et éducation sociale.</p>
<h3>TESIMAMA — Nos racines</h3><p>Reconnecter les personnes à leur identité, leurs valeurs, leurs ressources et leur dignité.</p>
<h3>TOLAMUKE — Notre éveil</h3><p>Développer la conscience, les compétences, la responsabilité et le leadership.</p>
<h3>TELUMIERE — Notre lumière</h3><p>Mettre les capacités au service de soi, de la famille, de la communauté et du bien commun.</p>",
            'is_published' => true,
        ]);

        // ===== Domaines d'action =====
        $domains = [
            ['slug' => 'sante-mentale-communautaire', 'title_fr' => 'Santé mentale communautaire', 'title_en' => 'Community mental health', 'order' => 1],
            ['slug' => 'resilience-humaine', 'title_fr' => 'Résilience humaine', 'title_en' => 'Human resilience', 'order' => 2],
            ['slug' => 'parentalite-positive', 'title_fr' => 'Parentalité positive', 'title_en' => 'Positive parenting', 'order' => 3],
            ['slug' => 'protection-de-lenfant', 'title_fr' => "Protection de l'enfant", 'title_en' => 'Child protection', 'order' => 4],
            ['slug' => 'leadership-feminin', 'title_fr' => 'Leadership féminin', 'title_en' => 'Female leadership', 'order' => 5],
            ['slug' => 'formation-renforcement-capacites', 'title_fr' => 'Formation & renforcement des capacités', 'title_en' => 'Training & capacity building', 'order' => 6],
            ['slug' => 'developpement-communautaire', 'title_fr' => 'Développement communautaire', 'title_en' => 'Community development', 'order' => 7],
        ];

        foreach ($domains as $domain) {
            ActionDomain::updateOrCreate(['slug' => $domain['slug']], $domain + ['is_published' => true]);
        }

        // ===== Catégories d'actualités =====
        $categories = [
            'Afrique', 'Cameroun', 'Monde', 'Santé mentale', 'Parentalité',
            "Protection de l'enfant", 'Leadership féminin', 'Citations africaines', 'Vie de la Fondation',
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(['slug' => \Illuminate\Support\Str::slug($name)], ['name_fr' => $name]);
        }

        // ===== Chiffres d'impact =====
        $stats = [
            ['label_fr' => 'Personnes accompagnées', 'label_en' => 'People supported', 'value' => 15000, 'order' => 1],
            ['label_fr' => 'Communautés touchées', 'label_en' => 'Communities reached', 'value' => 120, 'order' => 2],
            ['label_fr' => 'Formations et ateliers réalisés', 'label_en' => 'Trainings and workshops delivered', 'value' => 200, 'order' => 3],
            ['label_fr' => 'Partenaires et réseaux engagés', 'label_en' => 'Partners and networks engaged', 'value' => 50, 'order' => 4],
        ];

        foreach ($stats as $stat) {
            ImpactStat::updateOrCreate(['label_fr' => $stat['label_fr']], $stat);
        }
    }
}
