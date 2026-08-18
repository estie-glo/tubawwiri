<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Render (et Cloudflare devant) terminent le HTTPS et transmettent en HTTP
        // en interne : sans ça, Laravel génère des URLs d'assets en http:// et le
        // navigateur bloque le CSS/JS comme contenu mixte sur une page https.
        $middleware->trustProxies(at: '*');

        $middleware->alias([
    'setlocale' => \App\Http\Middleware\SetLocale::class,
]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
