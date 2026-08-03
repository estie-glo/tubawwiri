<?php

namespace App\Http\Controllers;

use App\Models\ImpactStat;
use App\Models\Testimonial;

class ImpactController extends Controller
{
    public function index()
    {
        $stats = ImpactStat::orderBy('order')->get();
        $testimonials = Testimonial::where('is_published', true)->get();

        return view('pages.impact.index', compact('stats', 'testimonials'));
    }
}
