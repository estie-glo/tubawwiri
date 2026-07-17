<?php

use App\Http\Controllers\ActionDomainController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ObservatoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/fr');

Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware('setlocale')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/qui-sommes-nous', [PageController::class, 'show'])
            ->defaults('slug', 'qui-sommes-nous')->name('about');

        Route::get('/notre-approche', [PageController::class, 'show'])
            ->defaults('slug', 'notre-approche')->name('approach');

        Route::get('/domaines-action', [ActionDomainController::class, 'index'])->name('action-domains.index');
        Route::get('/domaines-action/{actionDomain}', [ActionDomainController::class, 'show'])->name('action-domains.show');

        Route::get('/programmes', [ProgramController::class, 'index'])->name('programs.index');
        Route::get('/programmes/{program}', [ProgramController::class, 'show'])->name('programs.show');

        Route::get('/observatoire', [ObservatoryController::class, 'index'])->name('observatory.index');
        Route::get('/observatoire/{observatoryPost}', [ObservatoryController::class, 'show'])->name('observatory.show');

        Route::get('/tbw-consulting', [ConsultingController::class, 'index'])->name('consulting.index');
        Route::post('/tbw-consulting/devis', [ConsultingController::class, 'storeQuote'])->name('consulting.quote.store');

        Route::get('/tbw-academy', [AcademyController::class, 'index'])->name('academy.index');
        Route::get('/tbw-academy/{training}', [AcademyController::class, 'show'])->name('academy.show');
        Route::post('/tbw-academy/inscription', [AcademyController::class, 'storeEnrollment'])->name('academy.enroll.store');

        Route::get('/ressources', [ResourceController::class, 'index'])->name('resources.index');

        Route::get('/actualites', [NewsController::class, 'index'])->name('news.index');
        Route::get('/actualites/categorie/{categorySlug}', [NewsController::class, 'index'])->name('news.category');
        Route::get('/actualites/{article}', [NewsController::class, 'show'])->name('news.show');

        Route::get('/nos-impacts', [ImpactController::class, 'index'])->name('impact.index');

        Route::get('/faire-un-don', [DonationController::class, 'index'])->name('donation.index');
        Route::post('/faire-un-don', [DonationController::class, 'store'])->name('donation.store');

        Route::get('/nous-rejoindre', [JoinController::class, 'index'])->name('join.index');
        Route::post('/nous-rejoindre', [JoinController::class, 'store'])->name('join.store');

        Route::get('/medias', [MediaController::class, 'index'])->name('media.index');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
        Route::post('/devenir-partenaire', [ContactController::class, 'storePartner'])->name('partner.store');
    });

// 15. Boutique TBW (phase 2) - route réservée, à activer plus tard
// Route::prefix('{locale}')->group(function () {
//     Route::get('/boutique', [ShopController::class, 'index'])->name('shop.index');
// });
