<?php

namespace App\Providers\Filament;
use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
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
            ->renderHook(
                 \Filament\View\PanelsRenderHook::HEAD_END,
                  fn () => '<style>
                    .fi-simple-layout { background: #123D2E; }
                    .fi-simple-main-ctn {
                        position: relative;
                        background-image: url(\'' . asset('images/bg-tubawwiri.png') . '\');
                        background-size: cover;
                        background-position: center;
                        min-height: 100vh;
                        width: 100%;
                    }
                    .fi-simple-main-ctn::before {
                        content: \'\';
                        position: absolute;
                        inset: 0;
                        background: linear-gradient(to right, rgba(11,38,28,0.55), rgba(18,61,46,0.25));
                    }
                    .fi-simple-main {
                        position: relative;
                        z-index: 1;
                        background-color: #ffffff !important;
                    }
                    .fi-simple-main * { color: #1C1914 !important; }
                    .fi-simple-main label { font-weight: 600 !important; }
                    .fi-simple-main input {
                        background-color: #ffffff !important;
                        border: 1px solid #d8cfb8 !important;
                    }
                    .fi-simple-main button[type="submit"] {
                        background-color: #123D2E !important;
                        color: #ffffff !important;
                    }
                  </style>'
            )
            ->login()
            ->colors([
               'primary' => Color::hex('#123D2E'),
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
