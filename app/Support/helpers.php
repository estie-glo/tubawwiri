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

if (! function_exists('split_content_blocks')) {
    /**
     * Découpe un contenu HTML (issu d'un champ WYSIWYG) en blocs pour un
     * rendu en cadres/défilement : chaque <h3>/<h4> démarre un nouveau bloc
     * (titre + contenu jusqu'au suivant), les paragraphes en tête de contenu
     * (avant le premier titre) forment chacun leur propre bloc.
     *
     * @return array<int, array{heading: ?string, html: string}>
     */
    function split_content_blocks(?string $html): array
    {
        if (! is_string($html) || trim($html) === '') {
            return [];
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8"?><div>' . $html . '</div>');
        libxml_clear_errors();

        $container = $dom->getElementsByTagName('div')->item(0);
        if (! $container) {
            return [];
        }

        $blocks = [];
        $current = null;

        foreach ($container->childNodes as $node) {
            if ($node->nodeType !== XML_ELEMENT_NODE) {
                continue;
            }

            $tag = strtolower($node->nodeName);
            $outer = $dom->saveHTML($node);

            if (in_array($tag, ['h3', 'h4'], true)) {
                if ($current !== null) {
                    $blocks[] = $current;
                }
                $current = ['heading' => trim($node->textContent), 'html' => ''];
                continue;
            }

            if ($current === null) {
                $blocks[] = ['heading' => null, 'html' => $outer];
                continue;
            }

            $current['html'] .= $outer;
        }

        if ($current !== null) {
            $blocks[] = $current;
        }

        return $blocks;
    }
}
