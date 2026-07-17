<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $query = Resource::where('is_published', true);

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title_fr', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('description_fr', 'like', "%{$search}%")
                  ->orWhere('description_en', 'like', "%{$search}%");
            });
        }

        $resources = $query->orderByDesc('created_at')->get();

        $categories = [
            'guide' => 'Guide',
            'rapport' => 'Rapport',
            'outil' => 'Outil pratique',
            'podcast' => 'Podcast',
            'video' => 'Vidéo',
            'infographie' => 'Infographie',
            'document' => 'Document',
        ];

        return view('pages.resources.index', compact('resources', 'categories'));
    }
}
