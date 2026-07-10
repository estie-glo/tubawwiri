<?php

namespace App\Http\Controllers;

use App\Models\ActionDomain;
use App\Models\Article;
use App\Models\ImpactStat;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $actionDomains = ActionDomain::where('is_published', true)
            ->orderBy('order')
            ->get();

        $latestArticles = Article::published()->take(3)->get();

        $impactStats = ImpactStat::orderBy('order')->get();

        $testimonials = Testimonial::where('is_published', true)->take(3)->get();

        return view('pages.home', compact(
            'actionDomains', 'latestArticles', 'impactStats', 'testimonials'
        ));
    }
}
