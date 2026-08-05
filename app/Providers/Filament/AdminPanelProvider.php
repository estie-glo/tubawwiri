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
use Filament\Widgets;
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
            // Thème dédié (resources/css/filament/admin/theme.css), chargé via Vite
            // plutôt qu'un bloc <style> inline — voir le fichier pour le détail.
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => app(Vite::class)('resources/css/filament/admin/theme.css')->toHtml(),
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
            ->navigationGroups([
                NavigationGroup::make('Contenu du site')
                    ->icon('heroicon-o-rectangle-stack'),
                NavigationGroup::make('Actualités')
                    ->icon('heroicon-o-newspaper'),
                NavigationGroup::make('TBW Academy')
                    ->icon('heroicon-o-academic-cap'),
                NavigationGroup::make('Observatoire & Ressources')
                    ->icon('heroicon-o-magnifying-glass'),
                NavigationGroup::make('Médias')
                    ->icon('heroicon-o-photo'),
                NavigationGroup::make('Formulaires reçus')
                    ->icon('heroicon-o-inbox-arrow-down')
                    ->collapsed(),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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
