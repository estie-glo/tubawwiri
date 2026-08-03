<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;

trait RejectsHoneypot
{
    /**
     * Champ honeypot "website" : si rempli, on traite comme spam silencieux.
     */
    protected function isHoneypotFilled(Request $request): bool
    {
        $value = $request->input('website');

        return is_string($value) && trim($value) !== '';
    }
}
