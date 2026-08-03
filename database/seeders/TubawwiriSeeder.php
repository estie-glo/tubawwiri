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
    'content_fr' => <<<'HTML'
<p><em>Toute forêt commence par une graine. Toute transformation humaine commence par une idée.</em></p>
<p>En mars 2017, une graine a été semée. Cette graine s'appelait CAVAMIS : Conseils – Astuces de Vie pour Amis. Au départ, elle était discrète : ni institution, ni mouvement, simplement une conviction — chaque être humain peut grandir lorsqu'il reçoit une écoute sincère, des conseils adaptés et une main tendue.</p>
<p>Les années ont passé. La graine a développé des racines, nourrie par les expériences, les rencontres et les réalités du terrain. Puis est venu le temps de grandir : la graine est devenue un arbre. Cet arbre porte aujourd'hui un nom — <strong>Fondation TUBAWWIRI (TBW)</strong>.</p>
<p>Mais un arbre n'oublie jamais sa graine. La méthode CAVAMIS reste le cœur de son accompagnement, la doctrine des 3T en est les racines, et sa mission est de faire grandir des personnes, des familles et des communautés.</p>

<h3>Notre mission</h3>
<p>Promouvoir la santé mentale communautaire, renforcer la résilience humaine et accompagner les familles, les enfants, les femmes et les communautés vers un développement durable.</p>

<h3>Notre vision</h3>
<p>Être la référence africaine en santé mentale communautaire et en résilience humaine.</p>

<h3>Nos valeurs</h3>
<p>Sagesse, dignité, solidarité, résilience, intégrité, innovation, enracinement culturel.</p>

<h3>Notre fondatrice</h3>
<p><strong>Nana Fadimatou Ngapout</strong> — Fondatrice &amp; Directrice Exécutive (CEO), Juriste, Ingénieure éducative, Conseillère d'orientation scolaire, universitaire et professionnelle.</p>
<p>Professionnelle camerounaise engagée dans les domaines de l'éducation, des sciences humaines et du développement communautaire, elle associe le droit, les sciences de l'éducation et l'accompagnement humain, avec une conviction profonde : chaque personne possède en elle les ressources nécessaires pour se relever, grandir et contribuer au bien commun.</p>
<p>Maître en Droit pénal et Sciences criminelles, Ingénieure éducative en Intervention, Orientation et Éducation extrascolaire, titulaire d'un Master Professionnel en Guidance Counseling, elle occupe également des fonctions de responsabilité à l'Université d'Ebolowa.</p>
<p>Elle est à l'origine de la Méthode CAVAMIS et de la Doctrine des 3T — TESIMAMA, TOLAMUKE, TELUMIÈRE.</p>
<blockquote>
<p>« Ma passion est de voir les personnes et les communautés retrouver leurs racines, s'éveiller à leur potentiel et faire rayonner leur lumière. À travers la Fondation TUBAWWIRI, je souhaite contribuer à un monde où chacun peut grandir dans la dignité, renforcer sa résilience et transmettre un héritage positif aux générations futures. »</p>
<p><strong>— Nana Fadimatou Ngapout, Fondatrice</strong></p>
</blockquote>
HTML,
    'content_en' => <<<'HTML'
<p><em>Every forest begins with a seed. Every human transformation begins with an idea.</em></p>
<p>In March 2017, a seed was planted. That seed was called CAVAMIS: Life Advice and Tips for Friends. At first it was discreet — neither an institution nor a movement, simply a conviction: every human being can grow when given sincere listening, sound advice and a helping hand.</p>
<p>Years passed. The seed grew roots, nourished by experience, encounters and realities on the ground. Then came the time to grow: the seed became a tree. That tree now bears a name — <strong>TUBAWWIRI Foundation (TBW)</strong>.</p>
<p>But a tree never forgets its seed. The CAVAMIS method remains at the heart of its support, the 3T doctrine forms its roots, and its mission is to help people, families and communities grow.</p>

<h3>Our mission</h3>
<p>To promote community mental health, strengthen human resilience and support families, children, women and communities toward sustainable development.</p>

<h3>Our vision</h3>
<p>To become Africa's leading organization for community mental health and human resilience.</p>

<h3>Our values</h3>
<p>Wisdom, dignity, solidarity, resilience, integrity, innovation, cultural rootedness.</p>

<h3>Our founder</h3>
<p><strong>Nana Fadimatou Ngapout</strong> — Founder &amp; CEO, Lawyer, Educational Engineer, Academic and Career Guidance Counselor.</p>
<p>A Cameroonian professional engaged in education, human sciences and community development, she combines law, education sciences and human support with a deep conviction: every person holds within themselves the resources needed to rise, grow and contribute to the common good.</p>
<p>She holds a Master's in Criminal Law and Criminal Sciences, is an Educational Engineer in Intervention, Guidance and Extracurricular Education, and holds a Professional Master's in Guidance Counseling. She also holds a position of responsibility at the University of Ebolowa.</p>
<p>She originated the CAVAMIS Method and the 3T Doctrine — TESIMAMA, TOLAMUKE, TELUMIERE.</p>
<blockquote>
<p>"My passion is to see people and communities reconnect with their roots, awaken their potential and let their light shine. Through the TUBAWWIRI Foundation, I want to contribute to a world where everyone can grow in dignity, build resilience and pass on a positive legacy to future generations."</p>
<p><strong>— Nana Fadimatou Ngapout, Founder</strong></p>
</blockquote>
HTML,
    'is_published' => true,
]);

Page::updateOrCreate(['slug' => 'notre-approche'], [
    'title_fr' => 'Notre approche',
    'title_en' => 'Our approach',
    'content_fr' => <<<'HTML'
<h3>La Méthode CAVAMIS</h3>
<p>CAVAMIS signifie <em>Conseils – Astuces de Vie pour Amis</em>. Créée en mars 2017, elle constitue la graine historique, pédagogique et humaine ayant donné naissance à TUBAWWIRI. Elle repose sur sept piliers :</p>
<ul>
<li>L'écoute</li>
<li>Le conseil</li>
<li>La sensibilisation</li>
<li>L'éveil des consciences</li>
<li>La motivation</li>
<li>La transmission de connaissances utiles</li>
<li>Le passage à l'action</li>
</ul>

<h3>La Doctrine des 3T</h3>
<p>La Doctrine des 3T s'inspire directement de la Méthode CAVAMIS et structure le parcours de transformation : <strong>TESIMAMA → TOLAMUKE → TELUMIÈRE</strong> — se reconnecter, s'éveiller, agir et rayonner.</p>

<h4>TESIMAMA — Nos racines</h4>
<p>Se reconnecter à son identité, à son histoire, à ses valeurs, à sa famille, à sa culture et à ses ressources intérieures.</p>

<h4>TOLAMUKE — Notre éveil</h4>
<p>Développer sa conscience, ses connaissances, ses compétences, son discernement et son pouvoir d'agir.</p>

<h4>TELUMIÈRE — Notre lumière</h4>
<p>Mettre ses capacités, son expérience et ses talents au service de soi-même, de sa famille et de la communauté.</p>
HTML,
    'content_en' => <<<'HTML'
<h3>The CAVAMIS Method</h3>
<p>CAVAMIS stands for <em>Life Advice and Tips for Friends</em>. Created in March 2017, it is the historical, educational and human seed that gave birth to TUBAWWIRI. It rests on seven pillars:</p>
<ul>
<li>Listening</li>
<li>Advice</li>
<li>Awareness-raising</li>
<li>Awakening of consciousness</li>
<li>Motivation</li>
<li>Transmission of useful knowledge</li>
<li>Moving into action</li>
</ul>

<h3>The 3T Doctrine</h3>
<p>The 3T Doctrine is directly inspired by the CAVAMIS Method and structures the transformation journey: <strong>TESIMAMA → TOLAMUKE → TELUMIERE</strong> — reconnect, awaken, act and shine.</p>

<h4>TESIMAMA — Our roots</h4>
<p>Reconnecting with one's identity, history, values, family, culture and inner resources.</p>

<h4>TOLAMUKE — Our awakening</h4>
<p>Developing awareness, knowledge, skills, discernment and the power to act.</p>

<h4>TELUMIERE — Our light</h4>
<p>Putting one's abilities, experience and talents at the service of oneself, one's family and the community.</p>
HTML,
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
