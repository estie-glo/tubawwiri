<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;

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

        return back()->with('success', 'Merci pour votre intérêt ! Notre équipe partenariats vous contactera rapidement.');
    }
}
