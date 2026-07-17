<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionNotification;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function index()
    {
        return view('pages.donation.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'montant' => 'required|numeric|min:500',
            'moyen_paiement' => 'required|in:mtn_momo,orange_money,carte,virement',
            'type_don' => 'required|in:ponctuel,mensuel,parrainage,entreprise',
        ]);

        // NOTE pour le développeur : brancher ici l'API MTN MoMo / Orange Money
        // selon le moyen_paiement choisi, puis mettre à jour provider_reference et status.
        $donation = Donation::create($validated + ['status' => 'en_attente']);

        try {
            Mail::to(config('tubawwiri.mail_to.donations'))->send(new FormSubmissionNotification(
                'Nouvelle intention de don',
                [
                    'Nom' => $validated['nom'] ?? 'Anonyme',
                    'Email' => $validated['email'] ?? null,
                    'Téléphone' => $validated['telephone'] ?? null,
                    'Montant' => number_format($validated['montant'], 0, ',', ' ') . ' FCFA',
                    'Moyen de paiement' => $validated['moyen_paiement'],
                    'Type de don' => $validated['type_don'],
                ]
            ));
        } catch (\Throwable $e) {
            Log::warning('Échec envoi email notification [donations]: ' . $e->getMessage());
        }

        return redirect()
            ->route('donation.index', app()->getLocale())
            ->with('success', 'Merci pour votre générosité ! Vous allez recevoir les instructions de paiement.');
    }
}
