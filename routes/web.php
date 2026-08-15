<?php

use App\Http\Controllers\ActionDomainController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ObservatoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes bilingues FR/EN
|--------------------------------------------------------------------------
| Toutes les routes sont préfixées par {locale} (fr|en).
| Le middleware "setlocale" (voir app/Http/Middleware/SetLocale.php)
| applique App::setLocale() selon ce segment.
| La racine "/" redirige vers la langue par défaut (fr).
*/

Route::redirect('/', '/fr');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware('setlocale')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        // 2. Qui sommes-nous / 3. Notre approche -> pages institutionnelles génériques
        // Chaque paragraphe/cadre est une vraie page (1 cadre = 1 URL), avec
        // navigation précédent/suivant — voir CLAUDE.md 3.12.5.
        Route::get('/qui-sommes-nous', [PageController::class, 'show'])
            ->defaults('slug', 'qui-sommes-nous')->name('about');
        Route::get('/qui-sommes-nous/{position}', [PageController::class, 'show'])
            ->defaults('slug', 'qui-sommes-nous')->whereNumber('position')->name('about.show');

        Route::get('/notre-approche', [PageController::class, 'show'])
            ->defaults('slug', 'notre-approche')->name('approach');
        Route::get('/notre-approche/{position}', [PageController::class, 'show'])
            ->defaults('slug', 'notre-approche')->whereNumber('position')->name('approach.show');

        Route::get('/rubriques', [RubriqueController::class, 'index'])->name('rubriques.index');
        Route::get('/rubriques/{position}', [RubriqueController::class, 'show'])
            ->whereNumber('position')->name('rubriques.show');

        Route::get('/bibliographie-fondatrice', [FounderController::class, 'index'])->name('founder.index');
        Route::get('/bibliographie-fondatrice/{position}', [FounderController::class, 'index'])
            ->whereNumber('position')->name('founder.show');

        Route::get('/architecture-ecosysteme', [ArchitectureController::class, 'show'])->name('architecture.index');
        Route::get('/architecture-ecosysteme/{position}', [ArchitectureController::class, 'show'])
            ->whereNumber('position')->name('architecture.show');

        // 4. Domaines d'action
        Route::get('/domaines-action', [ActionDomainController::class, 'index'])->name('action-domains.index');
        Route::get('/domaines-action/{actionDomain}', [ActionDomainController::class, 'show'])->name('action-domains.show');
        Route::get('/domaines-action/{actionDomain}/{position}', [ActionDomainController::class, 'show'])
            ->whereNumber('position')->name('action-domains.show.field');

        // 5. Programmes
        Route::get('/programmes', [ProgramController::class, 'index'])->name('programs.index');
        Route::get('/programmes/{program}', [ProgramController::class, 'show'])->name('programs.show');
        Route::get('/programmes/{program}/{position}', [ProgramController::class, 'show'])
            ->whereNumber('position')->name('programs.show.field');

        // 6. Observatoire Africain de la Résilience
        Route::get('/observatoire', [ObservatoryController::class, 'index'])->name('observatory.index');
        Route::get('/observatoire/{observatoryPost}', [ObservatoryController::class, 'show'])->name('observatory.show');

        // 7. TBW Consulting
        Route::get('/tbw-consulting', [ConsultingController::class, 'index'])->name('consulting.index');
        Route::post('/tbw-consulting/devis', [ConsultingController::class, 'storeQuote'])
            ->middleware('throttle:8,1')
            ->name('consulting.quote.store');

        // 8. TBW Academy
        Route::get('/tbw-academy', [AcademyController::class, 'index'])->name('academy.index');
        Route::get('/tbw-academy/{training}', [AcademyController::class, 'show'])->name('academy.show');
        Route::post('/tbw-academy/inscription', [AcademyController::class, 'storeEnrollment'])
            ->middleware('throttle:8,1')
            ->name('academy.enroll.store');

        // 9. Centre de ressources
        Route::get('/ressources', [ResourceController::class, 'index'])->name('resources.index');

        // 10. Actualités
        Route::get('/actualites', [NewsController::class, 'index'])->name('news.index');
        Route::get('/actualites/categorie/{categorySlug}', [NewsController::class, 'index'])->name('news.category');
        Route::get('/actualites/{article}', [NewsController::class, 'show'])->name('news.show');

        // 11. Nos impacts
        Route::get('/nos-impacts', [ImpactController::class, 'index'])->name('impact.index');

        // 12. Faire un don
        Route::get('/faire-un-don', [DonationController::class, 'index'])->name('donation.index');
        Route::post('/faire-un-don', [DonationController::class, 'store'])
            ->middleware('throttle:5,1')
            ->name('donation.store');

        // 13. Nous rejoindre
        Route::get('/nous-rejoindre', [JoinController::class, 'index'])->name('join.index');
        Route::post('/nous-rejoindre', [JoinController::class, 'store'])
            ->middleware('throttle:8,1')
            ->name('join.store');

        // 14. Médias
        Route::get('/medias', [MediaController::class, 'index'])->name('media.index');

        // 16. Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contact', [ContactController::class, 'store'])
            ->middleware('throttle:8,1')
            ->name('contact.store');
        Route::post('/devenir-partenaire', [ContactController::class, 'storePartner'])
            ->middleware('throttle:8,1')
            ->name('partner.store');

        // Newsletter
        Route::post('/newsletter', [NewsletterController::class, 'store'])
            ->middleware('throttle:5,1')
            ->name('newsletter.store');
        Route::get('/newsletter/desabonnement', [NewsletterController::class, 'unsubscribeForm'])
            ->name('newsletter.unsubscribe.form');
        Route::post('/newsletter/desabonnement', [NewsletterController::class, 'unsubscribe'])
            ->middleware('throttle:5,1')
            ->name('newsletter.unsubscribe');
    });

// 15. Boutique TBW (phase 2) - route réservée, à activer plus tard
// Route::prefix('{locale}')->group(function () {
//     Route::get('/boutique', [ShopController::class, 'index'])->name('shop.index');
// });
