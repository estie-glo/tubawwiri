<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    public function index()
    {
        return view('pages.consulting.index');
    }

    public function storeQuote(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'organisation' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'service_souhaite' => 'nullable|string|max:255',
            'budget_estimatif' => 'nullable|string|max:100',
            'delai' => 'nullable|string|max:100',
            'description_besoin' => 'required|string',
        ]);

        QuoteRequest::create($validated);

        return back()->with('success', 'Votre demande de devis a bien été envoyée. Notre équipe vous contactera rapidement.');
    }
}
