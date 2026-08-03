<?php

use Illuminate\Database\Eloquent\Model;

if (! function_exists('localized')) {
    /**
     * Retourne le champ bilingue d'un modèle selon la locale courante.
     * Ex: localized($article, 'title') → title_en ou title_fr.
     */
    function localized(?Model $model, string $field, ?string $fallback = 'fr'): ?string
    {
        if (! $model) {
            return null;
        }

        $locale = app()->getLocale();
        $primary = $model->{$field . '_' . $locale} ?? null;

        if (is_string($primary) && trim($primary) !== '') {
            return $primary;
        }

        if ($fallback) {
            $secondary = $model->{$field . '_' . $fallback} ?? null;
            if (is_string($secondary) && trim($secondary) !== '') {
                return $secondary;
            }
        }

        // Dernier recours : l'autre langue
        $other = $locale === 'en' ? 'fr' : 'en';

        return $model->{$field . '_' . $other} ?? null;
    }
}
