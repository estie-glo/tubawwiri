<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    // Guides, publications, rapports, outils pratiques, podcasts, vidéos, infographies
    public function index(Request $request)
    {
        $query = Report::where('is_published', true);

        if ($request->filled('q')) {
            $query->where('title_fr', 'like', '%' . $request->q . '%');
        }

        $resources = $query->orderByDesc('published_on')->paginate(12);

        return view('pages.resources.index', compact('resources'));
    }
}
