<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RejectsHoneypot;
use App\Mail\FormSubmissionNotification;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ConsultingController extends Controller
{
    use RejectsHoneypot;

    public function index()
    {
        return view('pages.consulting.index');
    }

    public function storeQuote(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return back()->with('success', 'Votre demande de devis a bien été envoyée. Notre équipe vous contactera rapidement.');
        }

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

        try {
            Mail::to(config('tubawwiri.mail_to.consulting'))->send(new FormSubmissionNotification(
                'Nouvelle demande de devis — TBW Consulting',
                [
                    'Nom' => $validated['nom'],
                    'Organisation' => $validated['organisation'] ?? null,
                    'Email' => $validated['email'],
                    'Téléphone' => $validated['telephone'] ?? null,
                    'Pays' => $validated['pays'] ?? null,
                    'Service souhaité' => $validated['service_souhaite'] ?? null,
                    'Budget estimatif' => $validated['budget_estimatif'] ?? null,
                    'Délai' => $validated['delai'] ?? null,
                    'Besoin' => $validated['description_besoin'],
                ]
            ));
        } catch (\Throwable $e) {
            Log::warning('Échec envoi email notification [consulting]: ' . $e->getMessage());
        }

        return back()->with('success', 'Votre demande de devis a bien été envoyée. Notre équipe vous contactera rapidement.');
    }
}
