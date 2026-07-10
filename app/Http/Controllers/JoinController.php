<?php

namespace App\Http\Controllers;

use App\Models\JoinRequest;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function index()
    {
        return view('pages.join.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'profil' => 'required|in:membre,benevole,stagiaire,consultant,ambassadeur',
            'motivation' => 'nullable|string',
        ]);

        JoinRequest::create($validated);

        return back()->with('success', 'Merci ! Votre demande a bien été envoyée, la Tribu TUBAWWIRI vous recontactera bientôt.');
    }
}
