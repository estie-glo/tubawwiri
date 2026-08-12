# TUBAWWIRI — Point de situation (à donner à Claude au début de la prochaine conversation)

Colle ce document (ou upload-le) au tout début d'une nouvelle conversation, avec
un message du genre : "Je continue le projet TUBAWWIRI, voici où j'en suis."

## Le projet

Site web Laravel 11 + Filament 3 pour la Fondation TUBAWWIRI (TBW), ONG
camerounaise (santé mentale communautaire, résilience humaine, parentalité
positive, protection de l'enfant, leadership féminin, développement
communautaire). Bilingue FR/EN, 16 pages publiques + admin Filament.

Projet en local sur : `~/tubawwiri` (Ubuntu, machine perso)
Dépôt GitHub : `https://github.com/estie-glo/tubawwiri` (branche principale de
travail : `develop`)

## Équipe

- **Moi (Wandji)** : fondations, layout, design system, admin Filament, emails,
  rôles, SEO — lead intégration/merge.
- **Bryan** : Domaines d'action, Programmes, Observatoire, Centre de ressources,
  Nos impacts, Médias — lot terminé.
- **Sibefeu** : TBW Consulting, TBW Academy, Actualités, Faire un don, Nous
  rejoindre, Contact, Newsletter.

## Outils utilisés en parallèle

- **Claude (ici, claude.ai)** : conception, corrections ciblées, documents.
- **Cursor** : a fait une grosse refonte de design à un moment (a changé
  certaines classes CSS, ex: police Manrope au lieu de Work Sans — à connaître
  si je réutilise d'anciennes instructions).
- **Claude Code** (terminal, `claude` dans `~/tubawwiri`) : reprend le
  flambeau pour finir le projet, guidé par un fichier `CLAUDE.md` à la racine
  du projet qu'il lit automatiquement à chaque session. Documents sources
  originaux (cahier des charges, biographie fondatrice, architecture TBW,
  rubriques) placés dans `~/tubawwiri/docs-source/`.

## Système de design (à respecter dans toute nouvelle demande)

- Vert forêt `#123D2E` (primaire), bordeaux `#6B2A28`, or `#C99A3E`, violet
  `#3B2560`, fond crème `#F6F1E4`.
- Titres en police Fraunces (`font-display`), texte courant en Manrope
  (`font-body`).
- Pas de `rounded-2xl`/`shadow` génériques, séparateurs fins plutôt que cartes
  ombrées, aucun emoji comme icône.
- Animations `reveal` (fondu au scroll) et `hover-lift` (élévation au survol)
  à généraliser partout, y compris admin.
- Fond photo de marque généré via Canva (`public/images/banner-tubawwiri.jpeg`
  sur l'accueil, effet Ken Burns).

## État d'avancement (résumé)

✅ Terminé : layout/header/footer, accueil, Qui sommes-nous, Notre approche
(contenu réel de la fondatrice), tous les formulaires (bilingues, avec
validation soignée), emails de notification (testés via Gmail SMTP), rôles
admin (admin/editor), SEO (sitemap, meta, Open Graph), 10 rubriques
officielles Actualités, Programmes enrichis (structure complète + Défis 3T),
Parcours d'engagement sur Nous rejoindre (6 rôles officiels), contacts et
réseaux sociaux réels (WhatsApp, MoMo, Orange Money, Facebook/Instagram/
LinkedIn/TikTok/Threads).

🔧 En cours (Claude Code) : refonte visuelle complète de l'admin Filament
(thème dédié aux couleurs TBW, dashboard avec bandeau de bienvenue et
statistiques, sidebar réductible, animations, fond photo sur le login).

❌ Pas commencé : hébergement réel, achat du domaine, paiement Mobile Money
réel (API), emails professionnels, Google Analytics (identifiant réel),
`ResourceResource` Filament pour le Centre de ressources (pas d'interface
admin pour ce module).

## Comptes utiles

- Admin local : `wandji@tubawwiri.org` — mot de passe seedé
  `ChangeMoi2026!` (⚠️ à changer avant toute mise en ligne réelle)
- URL locale : `http://127.0.0.1:8000` (lancer `php artisan serve` +
  `npm run dev` dans deux terminaux séparés)
- Admin : `http://127.0.0.1:8000/admin`

## Documents déjà produits (à ne pas refaire, juste les retrouver)

- `PLAN_EQUIPE_TUBAWWIRI` — répartition du travail et stratégie Git
- `FICHE_DESIGN_TUBAWWIRI` — charte pour Bryan/Sibefeu
- `Guide_Administration_TUBAWWIRI.docx` — guide de prise en main pour la
  Fondatrice
- `Guide_Presentation_Demo_TUBAWWIRI.docx` — script de démo du site
- `Proposition_Hebergement_Hostinger.docx` — devis hébergement (formule
  Business recommandée, ~30-42 000 FCFA la 1ère année)
- `CLAUDE.md` — contexte complet pour Claude Code (à la racine du projet)

## Réflexes Git à rappeler dès le début de toute session de travail

```bash
cd ~/tubawwiri
git status
git fetch origin
git pull origin develop   # si du retard existe
```
Et après chaque bloc de travail : `git add . && git commit -m "..." && git push origin develop`
(l'équipe a déjà perdu du travail plusieurs fois faute de ce réflexe).

## Pour reprendre la conversation efficacement

Dis-moi simplement où tu en es concrètement, par exemple :
- "Claude Code a fini l'admin, voici une capture, qu'en penses-tu ?"
- "J'ai un bug précis : [message d'erreur exact]"
- "Je veux avancer sur [tel sujet de la liste 'pas commencé']"
