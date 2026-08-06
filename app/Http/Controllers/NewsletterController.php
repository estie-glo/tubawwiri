<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RejectsHoneypot;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    use RejectsHoneypot;

    public function store(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return back()->with('success', __('forms.newsletter_success'));
        }

        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        Subscriber::updateOrCreate(
            ['email' => strtolower($validated['email'])],
            [
                'locale' => app()->getLocale(),
                'is_active' => true,
                'subscribed_at' => now(),
            ]
        );

        return back()->with('success', __('forms.newsletter_success'));
    }

    public function unsubscribeForm()
    {
        return view('pages.newsletter.unsubscribe');
    }

    public function unsubscribe(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return back()->with('success', __('forms.newsletter_unsubscribed'));
        }

        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        Subscriber::where('email', strtolower($validated['email']))->update([
            'is_active' => false,
        ]);

        // Message générique : ne confirme jamais si l'email était réellement inscrit.
        return back()->with('success', __('forms.newsletter_unsubscribed'));
    }
}
