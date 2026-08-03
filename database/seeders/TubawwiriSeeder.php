<?php

namespace Database\Seeders;

use App\Models\ActionDomain;
use App\Models\Article;
use App\Models\Category;
use App\Models\ImpactStat;
use App\Models\MediaItem;
use App\Models\Page;
use App\Models\Program;
use App\Models\Report;
use App\Models\Resource;
use App\Models\Testimonial;
use App\Models\Training;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TubawwiriSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedPages();
        $this->seedDomainsAndPrograms();
        $this->seedCategoriesAndArticles();
        $this->seedImpact();
        $this->seedTrainings();
        $this->seedObservatoryAndResources();
        $this->seedMedia();
    }

    private function seedPages(): void
    {
        Page::updateOrCreate(['slug' => 'qui-sommes-nous'], [
            'title_fr' => 'Qui sommes-nous',
            'title_en' => 'About us',
            'content_fr' => '<p>La Fondation TUBAWWIRI (TBW) œuvre pour la promotion de la santé mentale communautaire et de la résilience humaine.</p>
<p><strong>Mission :</strong> Promouvoir la santé mentale communautaire, renforcer la résilience humaine et accompagner les familles, les enfants, les femmes et les communautés vers un développement durable.</p>
<p><strong>Valeurs :</strong> sagesse, dignité, solidarité, résilience, intégrité, innovation, enracinement culturel.</p>
<p><em>To Be Wise · To Be Whole · To Be Worthy</em></p>',
            'content_en' => '<p>The TUBAWWIRI Foundation (TBW) promotes community mental health and human resilience.</p>
<p><strong>Mission:</strong> To promote community mental health, strengthen human resilience and support families, children, women and communities toward sustainable development.</p>
<p><strong>Values:</strong> wisdom, dignity, solidarity, resilience, integrity, innovation, cultural rootedness.</p>
<p><em>To Be Wise · To Be Whole · To Be Worthy</em></p>',
            'meta_title_fr' => 'Qui sommes-nous — Fondation TUBAWWIRI',
            'meta_title_en' => 'About us — TUBAWWIRI Foundation',
            'meta_description_fr' => 'Découvrez la mission, la vision et les valeurs de la Fondation TUBAWWIRI (TBW).',
            'meta_description_en' => 'Discover the mission, vision and values of the TUBAWWIRI Foundation (TBW).',
            'is_published' => true,
        ]);

        Page::updateOrCreate(['slug' => 'notre-approche'], [
            'title_fr' => 'Notre approche',
            'title_en' => 'Our approach',
            'content_fr' => '<p>La méthode <strong>CAVAMIS</strong> est une approche de conseils, astuces de vie, accompagnement communautaire, prévention et éducation sociale.</p>
<h3>TESIMAMA — Nos racines</h3><p>Reconnecter les personnes à leur identité, leurs valeurs, leurs ressources et leur dignité.</p>
<h3>TOLAMUKE — Notre éveil</h3><p>Développer la conscience, les compétences, la responsabilité et le leadership.</p>
<h3>TELUMIERE — Notre lumière</h3><p>Mettre les capacités au service de soi, de la famille, de la communauté et du bien commun.</p>',
            'content_en' => '<p>The <strong>CAVAMIS</strong> method combines life guidance, community support, prevention and social education.</p>
<h3>TESIMAMA — Our roots</h3><p>Reconnecting people to their identity, values, resources and dignity.</p>
<h3>TOLAMUKE — Our awakening</h3><p>Developing awareness, skills, responsibility and leadership.</p>
<h3>TELUMIERE — Our light</h3><p>Putting abilities at the service of oneself, family, community and the common good.</p>',
            'meta_title_fr' => 'Notre approche CAVAMIS & 3T',
            'meta_title_en' => 'Our CAVAMIS & 3T approach',
            'is_published' => true,
        ]);
    }

    private function seedDomainsAndPrograms(): void
    {
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
            ActionDomain::updateOrCreate(['slug' => $domain['slug']], $domain + [
                'summary_fr' => 'Actions et accompagnement autour de : '.$domain['title_fr'].'.',
                'summary_en' => 'Actions and support around: '.$domain['title_en'].'.',
                'enjeux_fr' => 'Renforcer les réponses communautaires face aux défis liés à '.$domain['title_fr'].'.',
                'enjeux_en' => 'Strengthen community responses to challenges related to '.$domain['title_en'].'.',
                'objectifs_fr' => 'Sensibiliser, former et accompagner les acteurs locaux.',
                'objectifs_en' => 'Raise awareness, train and support local actors.',
                'actions_fr' => 'Ateliers, groupes de parole, campagnes et partenariats.',
                'actions_en' => 'Workshops, talking circles, campaigns and partnerships.',
                'publics_cibles_fr' => 'Familles, jeunes, femmes, leaders communautaires.',
                'publics_cibles_en' => 'Families, youth, women, community leaders.',
                'resultats_attendus_fr' => 'Communautés plus résilientes et mieux informées.',
                'resultats_attendus_en' => 'More resilient and better-informed communities.',
                'appel_partenariat_fr' => 'Rejoignez-nous pour développer ce domaine d’action.',
                'appel_partenariat_en' => 'Join us to grow this area of action.',
                'is_published' => true,
            ]);
        }

        $mentalHealth = ActionDomain::where('slug', 'sante-mentale-communautaire')->first();
        $resilience = ActionDomain::where('slug', 'resilience-humaine')->first();
        $parenting = ActionDomain::where('slug', 'parentalite-positive')->first();

        $programs = [
            [
                'slug' => 'familles-resilientes',
                'action_domain_id' => $mentalHealth?->id,
                'title_fr' => 'Familles résilientes',
                'title_en' => 'Resilient families',
                'summary_fr' => 'Accompagner les familles vers une meilleure santé mentale et cohésion.',
                'summary_en' => 'Supporting families toward better mental health and cohesion.',
                'duree' => '12 mois',
            ],
            [
                'slug' => 'ecoles-resilientes',
                'action_domain_id' => $resilience?->id,
                'title_fr' => 'Écoles résilientes',
                'title_en' => 'Resilient schools',
                'summary_fr' => 'Renforcer le bien-être psychosocial en milieu scolaire.',
                'summary_en' => 'Strengthening psychosocial wellbeing in schools.',
                'duree' => 'Année scolaire',
            ],
            [
                'slug' => 'defi-tesimama',
                'action_domain_id' => $resilience?->id,
                'title_fr' => 'Défi TESIMAMA',
                'title_en' => 'TESIMAMA Challenge',
                'summary_fr' => 'Reconnecter les personnes à leurs racines et à leur dignité.',
                'summary_en' => 'Reconnecting people to their roots and dignity.',
                'duree' => '3 mois',
            ],
            [
                'slug' => 'defi-tolamuke',
                'action_domain_id' => $resilience?->id,
                'title_fr' => 'Défi TOLAMUKE',
                'title_en' => 'TOLAMUKE Challenge',
                'summary_fr' => 'Développer conscience, compétences et leadership.',
                'summary_en' => 'Building awareness, skills and leadership.',
                'duree' => '3 mois',
            ],
            [
                'slug' => 'defi-telumiere',
                'action_domain_id' => $resilience?->id,
                'title_fr' => 'Défi TELUMIERE',
                'title_en' => 'TELUMIERE Challenge',
                'summary_fr' => 'Mettre les capacités au service du bien commun.',
                'summary_en' => 'Putting abilities at the service of the common good.',
                'duree' => '3 mois',
            ],
            [
                'slug' => 'parents-tbw',
                'action_domain_id' => $parenting?->id,
                'title_fr' => 'Parents TBW',
                'title_en' => 'TBW Parents',
                'summary_fr' => 'Parentalité positive et soutien aux familles.',
                'summary_en' => 'Positive parenting and family support.',
                'duree' => '6 mois',
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(['slug' => $program['slug']], $program + [
                'objectifs_fr' => 'Renforcer les capacités des bénéficiaires et des communautés.',
                'objectifs_en' => 'Strengthen the capacities of beneficiaries and communities.',
                'activites_fr' => 'Ateliers, accompagnement, suivi et sensibilisation.',
                'activites_en' => 'Workshops, coaching, follow-up and awareness.',
                'beneficiaires_fr' => 'Familles, jeunes et acteurs communautaires.',
                'beneficiaires_en' => 'Families, youth and community actors.',
                'indicateurs_fr' => 'Nombre de participants, sessions et retours qualitatifs.',
                'indicateurs_en' => 'Number of participants, sessions and qualitative feedback.',
                'partenaires_souhaites_fr' => 'ONG, écoles, collectivités, bailleurs.',
                'partenaires_souhaites_en' => 'NGOs, schools, local authorities, donors.',
                'is_published' => true,
            ]);
        }
    }

    private function seedCategoriesAndArticles(): void
    {
        $categories = [
            ['name_fr' => 'Afrique', 'name_en' => 'Africa'],
            ['name_fr' => 'Cameroun', 'name_en' => 'Cameroon'],
            ['name_fr' => 'Monde', 'name_en' => 'World'],
            ['name_fr' => 'Santé mentale', 'name_en' => 'Mental health'],
            ['name_fr' => 'Parentalité', 'name_en' => 'Parenting'],
            ['name_fr' => "Protection de l'enfant", 'name_en' => 'Child protection'],
            ['name_fr' => 'Leadership féminin', 'name_en' => 'Female leadership'],
            ['name_fr' => 'Citations africaines', 'name_en' => 'African quotes'],
            ['name_fr' => 'Vie de la Fondation', 'name_en' => 'Foundation life'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name_fr'])],
                $category
            );
        }

        $cat = Category::where('slug', 'vie-de-la-fondation')->first()
            ?? Category::where('slug', 'sante-mentale')->first();

        Article::updateOrCreate(['slug' => 'lancer-la-tribu-tubawwiri'], [
            'category_id' => $cat?->id,
            'title_fr' => 'Lancer la Tribu TUBAWWIRI',
            'title_en' => 'Launching the TUBAWWIRI Tribe',
            'excerpt_fr' => 'Ensemble, cultivons nos racines, éveillons les consciences, faisons rayonner la lumière.',
            'excerpt_en' => 'Together, let us cultivate our roots, awaken consciences, and let the light shine.',
            'content_fr' => '<p>La Fondation TUBAWWIRI invite partenaires, bénévoles et communautés à rejoindre le mouvement.</p><p>Parler peut sauver des vies. Brisons le silence.</p>',
            'content_en' => '<p>The TUBAWWIRI Foundation invites partners, volunteers and communities to join the movement.</p><p>Speaking up can save lives. Let us break the silence.</p>',
            'author' => 'Fondation TUBAWWIRI',
            'published_at' => now()->subDays(3),
            'is_published' => true,
        ]);

        Article::updateOrCreate(['slug' => 'methode-cavamis-en-action'], [
            'category_id' => Category::where('slug', 'sante-mentale')->value('id'),
            'title_fr' => 'La méthode CAVAMIS en action',
            'title_en' => 'The CAVAMIS method in action',
            'excerpt_fr' => 'Comment CAVAMIS et la doctrine des 3T transforment les communautés.',
            'excerpt_en' => 'How CAVAMIS and the 3T doctrine transform communities.',
            'content_fr' => '<p>TESIMAMA, TOLAMUKE et TELUMIERE guident nos interventions de terrain.</p>',
            'content_en' => '<p>TESIMAMA, TOLAMUKE and TELUMIERE guide our field interventions.</p>',
            'author' => 'Équipe TBW',
            'published_at' => now()->subDays(10),
            'is_published' => true,
        ]);
    }

    private function seedImpact(): void
    {
        $stats = [
            ['label_fr' => 'Personnes accompagnées', 'label_en' => 'People supported', 'value' => 15000, 'order' => 1],
            ['label_fr' => 'Communautés touchées', 'label_en' => 'Communities reached', 'value' => 120, 'order' => 2],
            ['label_fr' => 'Formations et ateliers réalisés', 'label_en' => 'Trainings and workshops delivered', 'value' => 200, 'order' => 3],
            ['label_fr' => 'Partenaires et réseaux engagés', 'label_en' => 'Partners and networks engaged', 'value' => 50, 'order' => 4],
        ];

        foreach ($stats as $stat) {
            ImpactStat::updateOrCreate(['label_fr' => $stat['label_fr']], $stat);
        }

        Testimonial::updateOrCreate(['nom' => 'Amina K.'], [
            'role' => 'Bénéficiaire / Beneficiary',
            'content_fr' => 'Grâce à TUBAWWIRI, j’ai retrouvé la parole et la confiance au sein de ma communauté.',
            'content_en' => 'Thanks to TUBAWWIRI, I found my voice and confidence again within my community.',
            'is_published' => true,
        ]);

        Testimonial::updateOrCreate(['nom' => 'Jean-Paul M.'], [
            'role' => 'Partenaire / Partner',
            'content_fr' => 'Une organisation crédible, ancrée et tournée vers l’impact réel.',
            'content_en' => 'A credible, rooted organization focused on real impact.',
            'is_published' => true,
        ]);
    }

    private function seedTrainings(): void
    {
        $trainings = [
            [
                'slug' => 'sante-mentale-communautaire',
                'title_fr' => 'Santé mentale communautaire',
                'title_en' => 'Community mental health',
                'description_fr' => 'Module d\'introduction aux fondamentaux de la santé mentale communautaire : repérage, écoute, orientation.',
                'description_en' => 'Introduction to community mental health fundamentals: spotting, listening, referral.',
                'level' => 'debutant',
                'mode' => 'en_ligne',
                'duree' => '4 semaines',
                'price' => 15000,
            ],
            [
                'slug' => 'parentalite-positive-academy',
                'title_fr' => 'Parentalité positive',
                'title_en' => 'Positive parenting',
                'description_fr' => 'Techniques et postures pour accompagner les parents vers une éducation bienveillante et structurante.',
                'description_en' => 'Techniques and postures to support parents toward caring, structured education.',
                'level' => 'debutant',
                'mode' => 'presentiel',
                'duree' => '3 semaines',
                'price' => 12000,
            ],
            [
                'slug' => 'leadership-feminin-academy',
                'title_fr' => 'Leadership féminin',
                'title_en' => 'Female leadership',
                'description_fr' => 'Renforcement des capacités de leadership pour les femmes engagées dans le développement communautaire.',
                'description_en' => 'Leadership capacity building for women engaged in community development.',
                'level' => 'intermediaire',
                'mode' => 'en_ligne',
                'duree' => '6 semaines',
                'price' => 20000,
            ],
            [
                'slug' => 'protection-de-lenfant-academy',
                'title_fr' => "Protection de l'enfant",
                'title_en' => 'Child protection',
                'description_fr' => 'Repères pratiques pour prévenir et répondre aux risques de protection de l’enfant.',
                'description_en' => 'Practical benchmarks to prevent and respond to child protection risks.',
                'level' => 'intermediaire',
                'mode' => 'en_ligne',
                'duree' => '5 semaines',
                'price' => 18000,
            ],
        ];

        foreach ($trainings as $training) {
            Training::updateOrCreate(['slug' => $training['slug']], $training + ['is_published' => true]);
        }
    }

    private function seedObservatoryAndResources(): void
    {
        Report::updateOrCreate(['slug' => 'note-resilience-communautaire'], [
            'title_fr' => 'Note : résilience communautaire en Afrique centrale',
            'title_en' => 'Brief: community resilience in Central Africa',
            'type' => 'note',
            'summary_fr' => 'Premiers enseignements sur les leviers de résilience dans les communautés accompagnées.',
            'summary_en' => 'Early lessons on resilience levers in supported communities.',
            'published_on' => now()->subMonths(1)->toDateString(),
            'is_published' => true,
        ]);

        Report::updateOrCreate(['slug' => 'analyse-sante-mentale-jeunes'], [
            'title_fr' => 'Analyse : santé mentale des jeunes',
            'title_en' => 'Analysis: youth mental health',
            'type' => 'analyse',
            'summary_fr' => 'Éclairage sur les besoins psychosociaux des jeunes et pistes d’action.',
            'summary_en' => 'Insights on youth psychosocial needs and action pathways.',
            'published_on' => now()->subMonths(2)->toDateString(),
            'is_published' => true,
        ]);

        Resource::updateOrCreate(['slug' => 'guide-ecoute-communautaire'], [
            'category' => 'guide',
            'title_fr' => 'Guide d’écoute communautaire',
            'title_en' => 'Community listening guide',
            'description_fr' => 'Outil pratique pour animer des espaces d’écoute bienveillante.',
            'description_en' => 'Practical tool to facilitate caring listening spaces.',
            'is_published' => true,
        ]);

        Resource::updateOrCreate(['slug' => 'infographie-3t'], [
            'category' => 'infographie',
            'title_fr' => 'Infographie — Doctrine des 3T',
            'title_en' => 'Infographic — 3T Doctrine',
            'description_fr' => 'TESIMAMA, TOLAMUKE, TELUMIERE expliqués en une page.',
            'description_en' => 'TESIMAMA, TOLAMUKE, TELUMIERE explained on one page.',
            'is_published' => true,
        ]);
    }

    private function seedMedia(): void
    {
        MediaItem::updateOrCreate(['title' => 'Communiqué de lancement'], [
            'type' => 'communique',
            'order' => 1,
        ]);

        MediaItem::updateOrCreate(['title' => 'Dossier de presse TUBAWWIRI'], [
            'type' => 'presse',
            'order' => 2,
        ]);
    }
}
