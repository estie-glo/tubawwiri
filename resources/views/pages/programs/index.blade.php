@extends('layouts.app')

@section('title', 'Programmes — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :title="__('site.nav.programs')" :intro="__('pages.programs_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
            @foreach ($programs as $i => $program)
                <x-program-card :program="$program" :index="$i" :highlighted="$i === 0" />
            @endforeach
        </div>
    </section>
@endsection
