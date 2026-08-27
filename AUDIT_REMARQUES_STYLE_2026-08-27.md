# Audit — Remarques de la Fondatrice & Charte de design

**Date** : 27/08/2026
**Demandé par** : Estelle
**Objectif** : vérifier indépendamment, dans le vrai code (pas dans les cases
`[x]` de `CLAUDE.md`), que toutes les remarques de la Fondatrice (sections 3.1
à 3.14 de `CLAUDE.md`) sont réellement implémentées, et que le style respecte
la charte de design (section 2 de `CLAUDE.md` + règles transverses 3.12.1 qui
priment dessus : boutons pilule, cadres à coins très arrondis, pas de violet
en aplat de fond).

**Méthode** : lecture de code + grep ciblés sur `resources/views`, vérification
de l'existence des images référencées sur le disque, et captures d'écran
réelles via `google-chrome --headless --screenshot` sur un serveur Laravel
local (build Vite compilé, base de données locale) — l'extension navigateur
Claude in Chrome n'était pas connectée pendant cette session. Audit en
lecture seule au moment de l'exécution ; les deux bugs trouvés ont été
corrigés dans une étape séparée après remise du rapport (voir section
"Corrections apportées" en bas).

---

## Verdict global

**Très largement conforme.** Sur une quarantaine d'exigences vérifiées
individuellement, une seule régression réelle (bug CSS) et un écart de
documentation mineur (`CLAUDE.md` décrivait une version de code déjà
remplacée par un commit ultérieur — pas un bug fonctionnel). Tout le reste
est confirmé par le code et/ou capture d'écran.

---

## Écart trouvé n°1 — bug réel (le plus important)

**Fichiers** : `resources/views/pages/founder/index.blade.php:53` et
`resources/views/pages/founder/apercu-unique.blade.php:45`

```
grid md:grid-cols-[1.5fr,1fr]
```

Syntaxe Tailwind invalide : une valeur arbitraire multi-tokens doit utiliser
un **underscore**, pas une virgule (`grid-cols-[1.5fr_1fr]`). Le CSS compilé
était `grid-template-columns:1.5fr,1fr` — invalide, ignoré silencieusement
par le navigateur. Résultat : la mise en page **restait en une seule
colonne** au lieu des 2 colonnes attendues (texte + photo/logo).

Confirmé visuellement (captures d'écran) sur les deux pages Bibliographie
(Option A **et** Option B) : la colonne photo/logo secondaire n'apparaissait
jamais à côté du texte. C'est exactement le bug que la section 3.14 de
`CLAUDE.md` dit avoir corrigé ("colonne photo secondaire + logo manquante...
corrigé") — **la correction n'avait en réalité jamais fonctionné.**

**Impact sur la décision en attente** : la Fondatrice doit choisir entre
Option A et Option B (voir tête de `CLAUDE.md`). Tant que ce bug n'était pas
corrigé, les deux pages comparées ratent toutes les deux l'effet "2 colonnes"
du mockup — la comparaison était faussée.

## Écart trouvé n°2 — écart de documentation (pas un bug fonctionnel)

Section 3.14 de `CLAUDE.md` décrivait le fix du "vide entre pied de page et
contenu" via :
```
<main class="flex-1 flex flex-col [&>*:last-child]:flex-1">
```
Ce code **n'existe plus** — un commit ultérieur le même jour (`e3980f5`,
postérieur à celui documenté) l'a retiré, ayant identifié que ce pattern
sticky-footer était lui-même la cause racine du bug. La solution actuelle
(`<main>` simple, sans contrainte de hauteur forcée) est plus saine, mais
`CLAUDE.md` décrivait une version obsolète du fix.

---

## Confirmé — règles transverses (section 2 / 3.12.1)

- **Boutons** : `.btn-tbw { border-radius: 999px; }` — pilule parfaite,
  utilisée partout. Aucun bouton rectangle-arrondi classique trouvé.
- **Cadres** : `rounded-[2.5rem]`, `rounded-3xl`, `rounded-2xl` généralisés
  (27 fichiers concernés), aucun résidu `rounded-none`/`rounded-sm`.
- **Violet `#3B2560`** : confirmé absent de tout fond (`bg-`) — ne reste que
  la variable CSS inutilisée et la barre dégradée de 3px en haut de page
  (accent ponctuel explicitement toléré par la Fondatrice).
- **Emojis en icône** : aucun trouvé (2 caractères ✓/✕ utilisés comme
  utilitaires de fermeture/succès sur un toast — usage mineur, pas un vrai
  emoji décoratif).
- **Classes `reveal`/`hover-lift`** : largement généralisées sur les
  sections/cartes du site public.

## Confirmé par capture d'écran

- **Accueil** : bannière sans anneau doré, boutons pilule.
- **Qui sommes-nous** : carrousel "1 carte = 1 page", pagination "01/07",
  flèches précédent/suivant, points de pagination.
- **Rubriques** : grille 5 colonnes, CTA "VOIR PLUS →", 10 rubriques avec
  leurs vraies photos.
- **Architecture** : 12 volets, "Volet 0X/12", panneau "PHOTO À VENIR"
  toujours actif sur le volet 7 testé (conforme à l'état documenté, pas une
  régression).
- **Contact** : pas de bandeau de titre séparé, décoration végétale en coin.
- **Médias** : grille 4 colonnes, compteurs en pied de carte, bouton "kit
  presse" sur une seule ligne (`whitespace-nowrap`).

## Confirmé par code — points ouverts de la tête de `CLAUDE.md`

- **(a) Architecture, volets 7-11** : toujours "Photo à venir" — seuls
  `identite-baobab.jpg` et `fondation-tubawwiri.jpg` existent dans
  `public/images/architecture/`. Exact, rien de plus fait depuis la dernière
  session sur ce point (bloqué par le quota Canva).
- **(b) Bibliographie Option A vs B** : les deux routes (`founder.index`,
  `founder.apercu`) existent toujours en parallèle, décision non tranchée.
  Exact.

## Confirmé — échantillon large du reste

Icônes sociales en vrai SVG (7 réseaux), pied de page 4 colonnes conforme au
mockup, newsletter en pilule dorée "S'inscrire", CAVAMIS 7 piliers avec
description (grille 4+3), Doctrine des 3T (`object-top` appliqué, délais
`reveal` 0/220/440ms, accent or partout — plus de violet clair résiduel),
carrousel Domaines d'action (flèche gauche **et** droite, autoplay 3.5s,
pause au survol, respecte `prefers-reduced-motion`), navigation clavier +
glisser-souris + autoplay 7,5s (code JS lu intégralement, comportement
conforme à la description), TBW Academy (5 formations avec photos réutilisées
des domaines, tri forcé par slug pour matcher l'ordre du mockup), page Don
(grille de pastilles sur 4 colonnes), Nous rejoindre (6 rôles en 3×2), Médias
(grille 4 colonnes), images `storage:link` (14/14 en `200`, vérifié lors de
la session de déploiement précédente).

---

## Corrections apportées après remise du rapport

Les deux écarts ci-dessus ont été corrigés le jour même, sur `develop` :

1. **Bug Bibliographie** — `grid-cols-[1.5fr,1fr]` → `grid-cols-[1.5fr_1fr]`
   dans les deux fichiers concernés. Commit `1009389`.
2. **Note `CLAUDE.md` obsolète** — corrigée pour refléter l'état réel du code
   (`<main>` simple depuis `e3980f5`). Commit `90d3d5f`.

Un troisième problème, **hors périmètre des remarques de la Fondatrice**
(n'affecte pas le site public), a été découvert pendant la vérification du
correctif n°1 : le CSS généré pour le déploiement Docker a toujours manqué
~30-40% de ses classes, presque toutes liées à l'**admin Filament**
(couleurs, animations, styles du composant de sélection Choices.js) — cause
et correctif détaillés dans `CLAUDE.md` section 10.3. Commit `007da2b`.

Voir `CLAUDE.md` section 3.15 pour le résumé de cet audit intégré à la
documentation de suivi du projet, et section 10 pour tout ce qui touche au
déploiement de test.
