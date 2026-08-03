<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RejectsHoneypot;
use App\Mail\FormSubmissionNotification;
use App\Models\JoinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
{
    use RejectsHoneypot;

    public function index()
    {
        return view('pages.join.index');
    }

    public function store(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return back()->with('success', __('forms.join_success'));
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'profil' => 'required|in:membre,benevole,stagiaire,consultant,ambassadeur',
            'motivation' => 'nullable|string',
        ]);

        JoinRequest::create($validated);

        try {
            Mail::to(config('tubawwiri.mail_to.join'))->send(new FormSubmissionNotification(
                'Nouvelle demande — Nous rejoindre (' . $validated['profil'] . ')',
                [
                    'Nom' => $validated['nom'],
                    'Email' => $validated['email'],
                    'Téléphone' => $validated['telephone'] ?? null,
                    'Pays' => $validated['pays'] ?? null,
                    'Profil demandé' => $validated['profil'],
                    'Motivation' => $validated['motivation'] ?? null,
                ]
            ));
        } catch (\Throwable $e) {
            Log::warning('Échec envoi email notification [join]: ' . $e->getMessage());
        }

        return back()->with('success', __('forms.join_success'));
    }
}
