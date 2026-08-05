<x-filament-widgets::widget>
    <div class="tbw-welcome-banner">
        <span class="tbw-welcome-tag">TESIMAMA &bull; TOLAMUKE &bull; TELUMIÈRE</span>
        <h2>Bienvenue, {{ auth()->user()->name ?? 'à la Fondation TUBAWWIRI' }}</h2>
        <p>
            {{ \Illuminate\Support\Carbon::now()->locale('fr')->translatedFormat('l j F Y') }}
            &mdash; Ensemble, cultivons nos racines, éveillons les consciences, faisons rayonner la lumière.
        </p>
    </div>
</x-filament-widgets::widget>
