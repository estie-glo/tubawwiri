<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

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

        return redirect()
            ->route('donation.index')
            ->with('success', 'Merci pour votre générosité ! Vous allez recevoir les instructions de paiement.');
    }
}
