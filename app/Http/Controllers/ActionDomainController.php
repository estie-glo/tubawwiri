<?php

namespace App\Http\Controllers;

use App\Models\ActionDomain;

class ActionDomainController extends Controller
{
    public function index()
    {
        $actionDomains = ActionDomain::where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('pages.action-domains.index', compact('actionDomains'));
    }

   public function show(string $locale, string $actionDomain)
{
    $actionDomain = ActionDomain::where('slug', $actionDomain)
        ->firstOrFail();

    $actionDomain->load('programs');

    return view('pages.action-domains.show', compact('actionDomain'));
}
}
