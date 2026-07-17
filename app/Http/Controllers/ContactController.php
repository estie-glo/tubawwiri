<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionNotification;
use App\Models\ContactMessage;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'sujet' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        $this->notify('contact', 'Nouveau message de contact', [
            'Nom' => $validated['nom'],
            'Email' => $validated['email'],
            'Téléphone' => $validated['telephone'] ?? null,
            'Pays' => $validated['pays'] ?? null,
            'Sujet' => $validated['sujet'] ?? null,
            'Message' => $validated['message'],
        ]);

        return back()->with('success', 'Votre message a bien été envoyé. Merci de nous avoir contactés.');
    }

    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'organisation' => 'required|string|max:255',
            'nom_responsable' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'type_partenariat' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        PartnerRequest::create($validated);

        $this->notify('partnership', 'Nouvelle demande de partenariat', [
            'Organisation' => $validated['organisation'],
            'Responsable' => $validated['nom_responsable'],
            'Email' => $validated['email'],
            'Téléphone' => $validated['telephone'] ?? null,
            'Pays' => $validated['pays'] ?? null,
            'Type de partenariat' => $validated['type_partenariat'] ?? null,
            'Message' => $validated['message'] ?? null,
        ]);

        return back()->with('success', 'Merci pour votre intérêt ! Notre équipe partenariats vous contactera rapidement.');
    }

    /**
     * Envoie une notification email sans jamais casser la soumission du formulaire
     * si l'envoi échoue (ex: SMTP non configuré) — on log l'erreur à la place.
     */
    private function notify(string $recipientKey, string $title, array $fields): void
    {
        try {
            $to = config("tubawwiri.mail_to.{$recipientKey}");
            Mail::to($to)->send(new FormSubmissionNotification($title, $fields));
        } catch (\Throwable $e) {
            Log::warning("Échec envoi email notification [{$recipientKey}]: " . $e->getMessage());
        }
    }
}
