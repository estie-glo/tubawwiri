<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingEnrollment;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function index()
    {
        $trainings = Training::where('is_published', true)->get();

        return view('pages.academy.index', compact('trainings'));
    }

    public function show(string $locale, string $training)
    {
        $training = Training::where('slug', $training)->firstOrFail();

        return view('pages.academy.show', compact('training'));
    }

    public function storeEnrollment(Request $request)
    {
        $validated = $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'niveau' => 'nullable|string|max:100',
            'mode' => 'nullable|in:presentiel,en_ligne',
        ]);

        TrainingEnrollment::create($validated);

        return back()->with('success', 'Votre inscription a bien été enregistrée. Vous recevrez un email de confirmation.');
    }
}
