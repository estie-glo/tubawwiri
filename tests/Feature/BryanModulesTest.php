<?php

namespace Tests\Feature;

use App\Models\ActionDomain;
use App\Models\ImpactStat;
use App\Models\MediaItem;
use App\Models\Program;
use App\Models\Report;
use App\Models\Resource;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BryanModulesTest extends TestCase
{
    use RefreshDatabase;

    public function test_domaines_action_index_fonctionne(): void
    {
        ActionDomain::factory()->create(['title_fr' => 'Santé mentale', 'is_published' => true]);

        $response = $this->get('/fr/domaines-action');

        $response->assertStatus(200);
        $response->assertSee('Santé mentale');
    }

    public function test_domaines_action_show_fonctionne(): void
    {
        $domain = ActionDomain::factory()->create(['slug' => 'sante-mentale', 'is_published' => true]);

        $response = $this->get('/fr/domaines-action/sante-mentale');

        $response->assertStatus(200);
    }

    public function test_programmes_index_fonctionne(): void
    {
        Program::factory()->create(['title_fr' => 'Familles résilientes', 'is_published' => true]);

        $response = $this->get('/fr/programmes');

        $response->assertStatus(200);
        $response->assertSee('Familles résilientes');
    }

    public function test_observatoire_index_fonctionne(): void
    {
        Report::create([
            'slug' => 'rapport-test',
            'title_fr' => 'Rapport de test',
            'type' => 'analyse',
            'summary_fr' => 'Résumé test',
            'published_on' => now(),
            'is_published' => true,
        ]);

        $response = $this->get('/fr/observatoire');

        $response->assertStatus(200);
        $response->assertSee('Rapport de test');
    }

    public function test_observatoire_show_fonctionne(): void
    {
        Report::create([
            'slug' => 'rapport-detail',
            'title_fr' => 'Rapport détail',
            'type' => 'note',
            'summary_fr' => 'Résumé',
            'published_on' => now(),
            'is_published' => true,
        ]);

        $response = $this->get('/fr/observatoire/rapport-detail');

        $response->assertStatus(200);
        $response->assertSee('Rapport détail');
    }

    public function test_ressources_index_fonctionne(): void
    {
        Resource::create([
            'slug' => 'guide-test',
            'category' => 'guide',
            'title_fr' => 'Guide de test',
            'description_fr' => 'Description test',
            'is_published' => true,
        ]);

        $response = $this->get('/fr/ressources');

        $response->assertStatus(200);
        $response->assertSee('Guide de test');
    }

    public function test_ressources_filtre_categorie_fonctionne(): void
    {
        Resource::create(['slug' => 'guide-1', 'category' => 'guide', 'title_fr' => 'Un guide', 'is_published' => true]);
        Resource::create(['slug' => 'video-1', 'category' => 'video', 'title_fr' => 'Une vidéo', 'is_published' => true]);

        $response = $this->get('/fr/ressources?category=guide');

        $response->assertStatus(200);
        $response->assertSee('Un guide');
        $response->assertDontSee('Une vidéo');
    }

    public function test_impacts_index_fonctionne(): void
    {
        ImpactStat::create(['label_fr' => 'Personnes accompagnées', 'value' => 15000, 'order' => 1]);
        Testimonial::create([
            'nom' => 'Aminata K.',
            'role' => 'Bénéficiaire',
            'content_fr' => 'TUBAWWIRI a changé ma vie.',
            'is_published' => true,
        ]);

        $response = $this->get('/fr/nos-impacts');

        $response->assertStatus(200);
        $response->assertSee('15 000');
        $response->assertSee('Aminata K.');
    }

    public function test_medias_index_fonctionne(): void
    {
        MediaItem::create([
            'title' => 'Photo atelier',
            'type' => 'photo',
            'file_path' => 'test.jpg',
            'order' => 1,
        ]);

        $response = $this->get('/fr/medias');

        $response->assertStatus(200);
        $response->assertSee('Photo atelier');
    }
}
