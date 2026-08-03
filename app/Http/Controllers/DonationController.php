<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RejectsHoneypot;
use App\Mail\FormSubmissionNotification;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    use RejectsHoneypot;

    public function index()
    {
        return view('pages.donation.index', [
            'paymentInstructions' => config('tubawwiri.donations'),
        ]);
    }

    public function store(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return redirect()
                ->route('donation.index', app()->getLocale())
                ->with('success', __('forms.donation_success'));
        }

        $validated = $request->validate([
            'nom' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'montant' => 'required|numeric|min:500',
            'moyen_paiement' => 'required|in:mtn_momo,orange_money,carte,virement',
            'type_don' => 'required|in:ponctuel,mensuel,parrainage,entreprise',
        ]);

        // Mode livrable : intention enregistrée + instructions manuelles affichées.
        // Brancher ici l'API MTN MoMo / Orange Money plus tard (provider_reference / status).
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
            ->with('success', __('forms.donation_success'))
            ->with('donation_method', $validated['moyen_paiement'])
            ->with('donation_amount', $validated['montant']);
    }
}
