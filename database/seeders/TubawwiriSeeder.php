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
        'title_fr' => 'Familles résilientes',
        'title_en' => 'Resilient Families',
        'summary_fr' => "Accompagner les familles dans le renforcement de leurs liens, de leur communication et de leur capacité à traverser les épreuves.",
        'probleme_fr' => "De nombreuses familles font face à des tensions, des ruptures de communication et un manque d'outils pour gérer les crises internes, fragilisant l'équilibre familial et le développement des enfants.",
        'public_concerne_fr' => "Familles, parents, couples, et aidants familiaux, en particulier dans les zones urbaines et périurbaines.",
        'objectifs_fr' => "<p>Renforcer la cohésion familiale, améliorer la communication intrafamiliale, et outiller les familles pour prévenir et surmonter les crises.</p>",
        'activites_fr' => "<p>Ateliers de communication familiale, groupes de parole, séances d'écoute individuelles, campagnes de sensibilisation communautaire.</p>",
        'resultats_attendus_fr' => "Des familles mieux outillées pour communiquer, gérer les conflits et soutenir le développement de chaque membre.",
        'beneficiaires_fr' => "Familles et parents des communautés accompagnées par la Fondation.",
        'indicateurs_fr' => "Nombre de familles accompagnées, taux de participation aux ateliers, évolution du bien-être familial perçu.",
        'defis_3t' => ['tesimama', 'tolamuke'],
        'partenaires_souhaites_fr' => "Structures sociales locales, écoles, associations de quartier.",
        'duree' => 'Programme continu',
    ],
    [
        'slug' => 'ecoles-resilientes',
        'title_fr' => 'Écoles résilientes',
        'title_en' => 'Resilient Schools',
        'summary_fr' => "Renforcer le bien-être psychosocial des élèves et des enseignants au sein du milieu scolaire.",
        'probleme_fr' => "Le milieu scolaire manque souvent de ressources pour accompagner la santé mentale des élèves et prévenir le harcèlement, le décrochage et la détresse psychologique.",
        'public_concerne_fr' => "Élèves, enseignants, personnel éducatif et parents d'élèves.",
        'objectifs_fr' => "<p>Développer des environnements scolaires bienveillants, former les enseignants à l'écoute active, et prévenir les violences en milieu scolaire.</p>",
        'activites_fr' => "<p>Formations pour enseignants, séances d'écoute pour élèves, campagnes de sensibilisation contre le harcèlement.</p>",
        'resultats_attendus_fr' => "Un climat scolaire plus sain, une meilleure détection précoce des situations de détresse chez les élèves.",
        'beneficiaires_fr' => "Établissements scolaires partenaires et leurs communautés éducatives.",
        'indicateurs_fr' => "Nombre d'écoles engagées, nombre d'enseignants formés, réduction des signalements de harcèlement.",
        'defis_3t' => ['tolamuke', 'telumiere'],
        'partenaires_souhaites_fr' => "Établissements scolaires, ministères de l'éducation, associations de parents d'élèves.",
        'duree' => 'Année scolaire',
    ],
    [
        'slug' => 'communautes-resilientes',
        'title_fr' => 'Communautés résilientes',
        'title_en' => 'Resilient Communities',
        'summary_fr' => "Mobiliser les communautés locales autour de la santé mentale collective et de l'entraide.",
        'probleme_fr' => "Les communautés manquent souvent de structures locales pour prévenir la souffrance psychologique et répondre collectivement aux crises sociales.",
        'public_concerne_fr' => "Communautés urbaines et rurales, leaders communautaires, associations de quartier.",
        'objectifs_fr' => "<p>Renforcer la cohésion sociale, structurer des réseaux d'entraide communautaire, et diffuser une culture de la résilience collective.</p>",
        'activites_fr' => "<p>Assemblées communautaires, formation de relais locaux, campagnes de sensibilisation de proximité.</p>",
        'resultats_attendus_fr' => "Des communautés davantage soudées, capables de prévenir et gérer collectivement les situations de crise.",
        'beneficiaires_fr' => "Communautés touchées par les actions de la Fondation.",
        'indicateurs_fr' => "Nombre de communautés mobilisées, nombre de relais communautaires formés.",
        'defis_3t' => ['tesimama', 'tolamuke', 'telumiere'],
        'partenaires_souhaites_fr' => "Autorités locales, chefferies traditionnelles, ONG locales.",
        'duree' => 'Programme continu',
    ],
    [
        'slug' => 'defi-tesimama',
        'title_fr' => 'Défi TESIMAMA',
        'title_en' => 'TESIMAMA Challenge',
        'summary_fr' => "Un défi individuel et collectif pour se reconnecter à son identité, ses valeurs et ses ressources.",
        'probleme_fr' => "Beaucoup de personnes ont perdu le lien avec leurs racines identitaires, culturelles et familiales, fragilisant leur sentiment d'appartenance et leur bien-être.",
        'public_concerne_fr' => "Toute personne engagée dans un parcours de transformation avec TUBAWWIRI — bénévoles, membres, bénéficiaires.",
        'objectifs_fr' => "<p>Inviter chaque participant à retrouver une valeur, une histoire ou une ressource personnelle, familiale, culturelle ou communautaire.</p>",
        'activites_fr' => "<p>Exercices de reconnexion identitaire, ateliers de mémoire familiale, temps de partage culturel.</p>",
        'resultats_attendus_fr' => "Une meilleure connaissance de soi et un ancrage identitaire renforcé chez les participants.",
        'beneficiaires_fr' => "Membres et bénéficiaires des programmes TUBAWWIRI.",
        'indicateurs_fr' => "Nombre de défis TESIMAMA complétés, retours qualitatifs des participants.",
        'defis_3t' => ['tesimama'],
        'partenaires_souhaites_fr' => "Structures culturelles, associations de mémoire et de patrimoine.",
        'duree' => 'Parcours individuel',
    ],
    [
        'slug' => 'defi-tolamuke',
        'title_fr' => 'Défi TOLAMUKE',
        'title_en' => 'TOLAMUKE Challenge',
        'summary_fr' => "Un défi pour développer sa conscience, ses connaissances et son pouvoir d'agir.",
        'probleme_fr' => "Un manque de connaissances ou de compétences empêche souvent les individus d'agir efficacement face aux défis personnels ou communautaires.",
        'public_concerne_fr' => "Toute personne engagée dans un parcours de transformation avec TUBAWWIRI.",
        'objectifs_fr' => "<p>Inviter chaque participant à réfléchir, acquérir une connaissance, changer un regard ou développer une compétence.</p>",
        'activites_fr' => "<p>Modules d'apprentissage courts, ateliers de réflexion, mentorat.</p>",
        'resultats_attendus_fr' => "Une montée en compétence et en conscience mesurable chez les participants.",
        'beneficiaires_fr' => "Membres et bénéficiaires des programmes TUBAWWIRI.",
        'indicateurs_fr' => "Nombre de défis TOLAMUKE complétés, compétences acquises déclarées.",
        'defis_3t' => ['tolamuke'],
        'partenaires_souhaites_fr' => "TBW Academy, formateurs partenaires.",
        'duree' => 'Parcours individuel',
    ],
    [
        'slug' => 'defi-telumiere',
        'title_fr' => 'Défi TELUMIÈRE',
        'title_en' => 'TELUMIERE Challenge',
        'summary_fr' => "Un défi pour agir concrètement au bénéfice de soi, de sa famille ou de sa communauté.",
        'probleme_fr' => "La prise de conscience seule ne suffit pas : beaucoup de personnes ont besoin d'un cadre pour passer réellement à l'action.",
        'public_concerne_fr' => "Toute personne ayant complété les défis TESIMAMA et TOLAMUKE.",
        'objectifs_fr' => "<p>Inviter chaque participant à poser une action concrète au bénéfice d'elle-même, de sa famille ou de sa communauté.</p>",
        'activites_fr' => "<p>Projets d'action communautaire, engagement bénévole, initiatives de leadership local.</p>",
        'resultats_attendus_fr' => "Des actions concrètes et mesurables menées par les participants dans leur environnement.",
        'beneficiaires_fr' => "Membres et bénéficiaires des programmes TUBAWWIRI, communautés locales.",
        'indicateurs_fr' => "Nombre d'actions concrètes menées, impact rapporté sur les communautés bénéficiaires.",
        'defis_3t' => ['telumiere'],
        'partenaires_souhaites_fr' => "Associations locales, collectivités, entreprises partenaires.",
        'duree' => 'Parcours individuel',
    ],
    [
        'slug' => 'parents-tbw',
        'title_fr' => 'Parents TBW',
        'title_en' => 'TBW Parents',
        'summary_fr' => "Un programme dédié à l'accompagnement des parents vers une parentalité positive et bienveillante.",
        'probleme_fr' => "Beaucoup de parents manquent de repères et de soutien pour faire face aux défis éducatifs contemporains, ce qui fragilise la relation parent-enfant.",
        'public_concerne_fr' => "Parents, futurs parents, familles monoparentales et recomposées.",
        'objectifs_fr' => "<p>Promouvoir une parentalité positive, bienveillante et responsable à travers l'écoute, le conseil et l'accompagnement.</p>",
        'activites_fr' => "<p>Ligne d'écoute Allô Parentalité, ateliers pratiques, groupes de soutien entre parents.</p>",
        'resultats_attendus_fr' => "Des relations parent-enfant plus apaisées et des parents mieux outillés face aux défis éducatifs.",
        'beneficiaires_fr' => "Parents et familles des communautés accompagnées.",
        'indicateurs_fr' => "Nombre de parents accompagnés, nombre d'appels reçus sur la ligne d'écoute, satisfaction des participants.",
        'defis_3t' => ['tesimama', 'tolamuke', 'telumiere'],
        'partenaires_souhaites_fr' => "Centres de santé, écoles, associations de parents.",
        'duree' => 'Programme continu',
    ],
];

foreach ($programs as $program) {
    \App\Models\Program::updateOrCreate(
        ['slug' => $program['slug']],
        $program + ['is_published' => true]
    );
}
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
    [
        'name_fr' => 'Santé mentale communautaire',
        'name_en' => 'Community Mental Health',
    ],
    [
        'name_fr' => 'Allô Parentalité Écoute',
        'name_en' => 'Hello Parenting Helpline',
    ],
    [
        'name_fr' => "La Voix de l'Enfant",
        'name_en' => "The Child's Voice",
    ],
    [
        'name_fr' => 'TUBAWWIRI au Féminin',
        'name_en' => 'TUBAWWIRI Women',
    ],
    [
        'name_fr' => 'TUBAWWIRI au Masculin',
        'name_en' => 'TUBAWWIRI Men',
    ],
    [
        'name_fr' => 'Les Chroniques de la Mémoire',
        'name_en' => 'Memory Chronicles',
    ],
    [
        'name_fr' => 'Le Message TUBAWWIRI',
        'name_en' => 'The TUBAWWIRI Message',
    ],
    [
        'name_fr' => 'La Question TUBAWWIRI',
        'name_en' => 'The TUBAWWIRI Question',
    ],
    [
        'name_fr' => 'Les Campagnes TUBAWWIRI',
        'name_en' => 'TUBAWWIRI Campaigns',
    ],
    [
        'name_fr' => 'TUBAWWIRI Africa Watch',
        'name_en' => 'TUBAWWIRI Africa Watch',
    ],
];

foreach ($categories as $name) {
    Category::updateOrCreate(
        ['slug' => \Illuminate\Support\Str::slug($name['name_fr'])],
        ['name_fr' => $name['name_fr'], 'name_en' => $name['name_en']]
    );
}

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
