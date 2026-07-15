<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ObservatoryController extends Controller
{
    public function index()
    {
        $posts = Report::where('is_published', true)
            ->orderByDesc('published_on')
            ->get();

        return view('pages.observatory.index', compact('posts'));
    }

    public function show(string $locale, string $observatoryPost)
    {
        $post = Report::where('slug', $observatoryPost)->firstOrFail();

        return view('pages.observatory.show', compact('post'));
    }
}
