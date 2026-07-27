<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ObservatoryController extends Controller
{
    public function index()
    {
        $reports = Report::where('is_published', true)
            ->orderByDesc('published_on')
            ->paginate(9);

        return view('pages.observatory.index', compact('reports'));
    }

    public function show(string $locale, string $observatoryPost)
    {
        $report = Report::where('slug', $observatoryPost)->firstOrFail();

        return view('pages.observatory.show', compact('report'));
    }
}