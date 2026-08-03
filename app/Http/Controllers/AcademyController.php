<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RejectsHoneypot;
use App\Mail\FormSubmissionNotification;
use App\Models\Training;
use App\Models\TrainingEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AcademyController extends Controller
{
    use RejectsHoneypot;

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
        if ($this->isHoneypotFilled($request)) {
            return back()->with('success', __('forms.enrollment_success'));
        }

        $validated = $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'pays' => 'nullable|string|max:100',
            'niveau' => 'nullable|string|max:100',
            'mode' => 'nullable|in:presentiel,en_ligne',
        ]);

        $enrollment = TrainingEnrollment::create($validated);

        try {
            Mail::to(config('tubawwiri.mail_to.academy'))->send(new FormSubmissionNotification(
                'Nouvelle inscription — TBW Academy',
                [
                    'Formation' => $enrollment->training?->title_fr,
                    'Nom' => $validated['nom'],
                    'Email' => $validated['email'],
                    'Téléphone' => $validated['telephone'] ?? null,
                    'Pays' => $validated['pays'] ?? null,
                    'Niveau' => $validated['niveau'] ?? null,
                    'Mode' => $validated['mode'] ?? null,
                ]
            ));
        } catch (\Throwable $e) {
            Log::warning('Échec envoi email notification [academy]: ' . $e->getMessage());
        }

        return back()->with('success', __('forms.enrollment_success'));
    }
}
