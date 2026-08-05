<?php

namespace App\Providers\Filament;

use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Vite;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Fondation TUBAWWIRI (TBW)')
            ->favicon(asset('images/logo-tbw.jpg'))
            ->sidebarCollapsibleOnDesktop()
            // Thème + script dédiés, chargés via Vite plutôt qu'un bloc <style>/<script>
            // inline — voir resources/css/filament/admin/theme.css et
            // resources/js/filament/admin/sidebar-resize.js pour le détail.
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => app(Vite::class)([
                    'resources/css/filament/admin/theme.css',
                    'resources/js/filament/admin/sidebar-resize.js',
                ])->toHtml(),
            )
            ->login()
            // Le mode sombre automatique de Filament peut rendre le texte illisible
            // sur les fonds personnalisés (voir login) : on le désactive plutôt que
            // de rattraper le problème par-dessus avec du CSS.
            ->darkMode(false)
            ->colors([
                'primary' => Color::hex('#123D2E'),
                'danger' => Color::hex('#6B2A28'),
                'warning' => Color::hex('#C99A3E'),
                'success' => Color::hex('#1a5540'),
                'info' => Color::hex('#3B2560'),
                'gray' => Color::Stone,
            ])
            // Chaque ressource porte déjà sa propre icône ($navigationIcon) : Filament
            // interdit qu'un groupe ait aussi une icône dans ce cas (l'un ou l'autre,
            // pas les deux). On garde l'icône par ressource, plus précise dans une
            // sidebar dense, et on ne configure les groupes que pour l'ordre/le repli.
            ->navigationGroups([
                NavigationGroup::make('Contenu du site'),
                NavigationGroup::make('Actualités'),
                NavigationGroup::make('TBW Academy'),
                NavigationGroup::make('Observatoire & Ressources'),
                NavigationGroup::make('Médias'),
                NavigationGroup::make('Formulaires reçus')
                    ->collapsed(),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            // Seuls nos widgets (bandeau de bienvenue, statistiques) doivent
            // apparaître sur le dashboard — pas les widgets "Welcome / Sign out"
            // et "filament v3.3.54 / Documentation / GitHub" par défaut.
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
