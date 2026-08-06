# Fondation TUBAWWIRI (TBW) — Contexte projet pour Claude Code

**Par où commencer : section 3 (refonte visuelle de l'admin Filament), rien
d'autre avant. Le reste vient après, dans l'ordre des sections 5 puis 6.**

Lis ce fichier en entier avant de modifier quoi que ce soit. Il donne le contexte
complet du projet, la charte de design à respecter, et la liste précise de ce
qu'il reste à faire pour livrer.

## 1. Le projet

Site web Laravel 11 + Filament 3 pour la Fondation TUBAWWIRI (TBW), une
organisation camerounaise spécialisée en santé mentale communautaire, résilience
humaine, parentalité positive, protection de l'enfant, leadership féminin et
développement communautaire. Site bilingue FR/EN, 16 pages publiques + back-office
admin (Filament).

Slogan : "Ensemble, cultivons nos racines, éveillons les consciences, faisons
rayonner la lumière." Doctrine des 3T : TESIMAMA (nos racines) — TOLAMUKE (notre
éveil) — TELUMIERE (notre lumière). Méthode : CAVAMIS.

## 1bis. Documents sources originaux

Le dossier `docs-source/` (à la racine du projet, si présent) contient les
documents originaux fournis par la Fondatrice : cahier des charges complet,
document d'architecture de l'écosystème TUBAWWIRI (méthode CAVAMIS détaillée,
doctrine des 3T, parcours d'engagement, fonctions TBW Academy/Consulting),
rubriques officielles de contenu, biographie de la fondatrice. **Si ce dossier
existe, le consulter avant toute décision de contenu ou de structure** — c'est
la source de vérité, plus fiable que ce résumé.

## 2. Système de design du site public — déjà en place, à respecter

### Couleurs (valeurs hex exactes)
- Vert forêt (primaire) : `#123D2E`
- Bordeaux racine (accents) : `#6B2A28`
- Or mat (CTA/highlights) : `#C99A3E`
- Violet crépuscule (accent rare) : `#3B2560`
- Fond crème : `#F6F1E4`
- Texte : `#211D16` / `#4a453c` (plus doux)
- Bordures fines : `#e5ddc8` / `#d8cfb8`

### Typographie
- Titres : classe `font-display` (police Fraunces, chargée via Google Fonts dans
  le layout). `font-semibold`/`font-medium`, jamais `font-bold` brut.
- Texte courant : classe `font-body` (Manrope — changée depuis Work Sans par un
  précédent passage de Cursor, garder Manrope).

### Règles de mise en page (site public)
- Pas de `rounded-xl`/`rounded-2xl` généreux, sauf logo (cercle) et inputs.
- Pas de `shadow-*` sur toutes les cartes. Séparateurs fins
  (`border-b border-[#e5ddc8]`, `border-l-2 border-[#6B2A28]`).
- Aucun emoji comme icône.
- Animations déjà en place à généraliser : classe `reveal` (fondu au scroll,
  JS dans `public/js/reveal.js`) et `hover-lift` (légère élévation au survol)
  sur toutes les sections/cartes du site public.
- Fond photo de marque (généré via Canva, cohérent vert forêt/or) déjà en place
  sur l'accueil (`public/images/banner-tubawwiri.jpeg`, effet Ken Burns via
  classe `hero-kenburns`) et sur le login admin
  (`public/images/bg-tubawwiri.png`, voir `AdminPanelProvider.php`).

## 3. CHANTIER PRIORITAIRE — Admin Filament : le rendre beau et dynamique

**C'est la tâche n°1 demandée par la cliente.** L'admin Filament est actuellement
fonctionnel mais visuellement "par défaut" (thème Filament standard, juste la
couleur primaire changée en `#123D2E`). Objectif : un rendu **"style Canva"** —
soigné, chaleureux, avec du caractère — cohérent avec l'identité du site public,
mais rester dans les codes d'un vrai back-office (lisible, dense, pro).

Pistes concrètes :
- Créer un thème Filament personnalisé (`php artisan make:filament-theme` ou
  fichier CSS dédié via `->viteTheme()`) plutôt que d'empiler des `renderHook`
  bruts comme on l'a fait dans l'urgence pour le login — c'est fragile et a
  cassé plusieurs fois pendant qu'on itérait dessus.
- Page d'accueil du dashboard (`app/Filament/Pages` ou widgets) : ajouter un
  bandeau de bienvenue aux couleurs TBW, éventuellement avec le fond Canva en
  version discrète, et des widgets utiles : nombre de messages non lus, dons en
  attente, dernières inscriptions Academy.
- Sidebar/navigation : grouper visuellement par thème avec des icônes cohérentes
  (actuellement Heroicons par défaut, vérifier qu'aucune n'est invalide).
- Tables (listes) : uniformiser les couleurs de badges/statuts avec la palette
  TBW plutôt que les couleurs Filament par défaut (rouge/bleu/vert génériques).
- Formulaires admin : vérifier la cohérence visuelle, grouper les champs
  logiquement (déjà fait pour Program via `Fieldset`, à généraliser).
- Générer si besoin d'autres visuels de fond via Canva (même méthode que pour
  le login : `Canva:generate-design` avec `design_type: desktop_wallpaper`,
  palette `#123D2E`/`#C99A3E`/`#6B2A28`/`#3B2560`, style organique/épuré, PUIS
  exporter en PNG et demander à l'utilisatrice de télécharger le fichier
  elle-même — aucun accès direct aux fichiers Canva exportés n'est possible
  depuis l'environnement).

**Piège rencontré à éviter** : le mode sombre automatique de Filament peut
rendre le texte illisible sur fond personnalisé (texte sombre sur fond sombre).
Toujours forcer `color-scheme: light` sur les pages avec fond personnalisé, ou
gérer proprement le mode sombre avec des couleurs adaptées plutôt que de
l'ignorer.

## 4. Système de traduction bilingue — RÈGLE OBLIGATOIRE

Fichiers : `resources/lang/{fr,en}/site.php` (nav/footer/accueil),
`resources/lang/{fr,en}/forms.php` (labels formulaires),
`resources/lang/{fr,en}/pages.php` (intros de pages, libellés de champs).
Utiliser `__('fichier.cle')` pour tout texte fixe, jamais de français en dur.

Contenu en base avec colonne `_en` (ex: `title_en`, `summary_en`) : toujours
afficher avec :
```php
{{ app()->getLocale() === 'en' && $model->champ_en ? $model->champ_en : $model->champ_fr }}
```

**Limitation connue, à corriger si le temps le permet** : `ImpactStat`,
`Testimonial`, `MediaItem`, `Resource` (Centre de ressources) n'ont pas de
colonnes `_en`. Idem pour les champs longs `enjeux_fr`, `objectifs_fr`,
`actions_fr`, `publics_cibles_fr`, `resultats_attendus_fr` sur `ActionDomain`,
et plusieurs champs longs sur `Program` (sauf ceux ajoutés récemment :
`probleme_fr`, `public_concerne_fr`, `resultats_attendus_fr`, `defis_3t` —
ceux-là aussi n'ont que du français, à équiper de colonnes `_en` si on veut
aller au bout du bilinguisme).

## 5. RESTE À FAIRE POUR LIVRER (hors déploiement, voir section 6)

- [ ] **Admin Filament : refonte visuelle** (voir section 3, priorité n°1)
- [x] **`ResourceResource`** : fait — la ressource Filament pour le modèle
      `Resource` (Centre de ressources) existe déjà sous le nom
      `ResourceItemResource` (`app/Filament/Resources/ResourceItemResource.php`,
      ajoutée dans le commit `720d7a1`). CRUD complet, catégorie en badge,
      formulaire regroupé en sections (voir section 3).
- [ ] **Rôles/permissions** : vérifier que la restriction de suppression
      (admin uniquement) posée sur les 6 ressources "Formulaires reçus" est
      toujours active après les refontes de Cursor — retester avec un compte
      `role = editor`.
- [ ] **Newsletter** : vérifier l'état d'avancement (un commit Cursor mentionne
      "finaliser le bloc livraison (newsletter, mobile, anti-spam)" — auditer
      ce qui existe vraiment : formulaire d'inscription, table `subscribers`,
      gestion des abonnés côté admin).
- [ ] **Anti-spam formulaires** : vérifier la même chose (honeypot ou
      équivalent) sur les 6 formulaires publics.
- [ ] **Responsive mobile/tablette** : tester réellement sur petits écrans
      (CDC l'exige explicitement) — un commit Cursor mentionne du travail sur
      "mobile" mais à valider partout, pas juste sur l'accueil.
- [ ] **Audit contenu placeholder** : repérer tout texte de test encore présent
      (ex: descriptions génériques, `Lorem ipsum` éventuel) et le signaler
      plutôt que le publier tel quel.
- [ ] **QA formulaires bout-en-bout** : soumettre chaque formulaire (Contact,
      Partenariat, Devis, Inscription Academy, Nous rejoindre, Don), vérifier
      l'email de notification ET l'enregistrement en base à chaque fois.
- [ ] **Liens morts / 404** : parcourir les 16 pages en FR et EN, cliquer sur
      tous les liens internes, vérifier qu'aucun ne casse.
- [ ] **Checklist de recette du CDC** (déjà largement remplie, revérifier
      point par point) — voir `PLAN_EQUIPE_TUBAWWIRI` pour la liste complète.

## 6. Ordre de priorité

Commencer par la section 3 (refonte visuelle de l'admin Filament) avant tout le
reste. Une fois l'admin fait, enchaîner sur la liste de la section 5, puis
seulement ensuite s'attaquer aux sujets ci-dessous — qui dépendaient jusqu'ici
d'informations côté cliente mais peuvent maintenant être avancés autant que
possible (préparer le code/la configuration, même si certaines valeurs réelles
— domaine, comptes marchands, identifiants — ne seront connues que plus tard) :

- Domaine `tubawwiri.org`, hébergement, SSL, sauvegardes
- Intégration réelle des paiements MTN MoMo / Orange Money (au-delà de
  l'affichage actuel des numéros personnels en attendant, voir
  `config/tubawwiri.php` → `donations`)
- Emails professionnels (`contact@tubawwiri.org`, etc.)
- Google Analytics (le code est prêt, `config('services.google_analytics_id')`
  ne demande qu'un identifiant réel)

## 7. Équipe et répartition d'origine (pour contexte historique)

- **Wandji** : fondations (Accueil, Qui sommes-nous, Notre approche), layout,
  design system, admin Filament, emails, rôles, SEO — lead intégration.
- **Bryan** : Domaines d'action, Programmes, Observatoire, Centre de ressources,
  Nos impacts, Médias — lot terminé.
- **Sibefeu** : TBW Consulting, TBW Academy, Actualités, Faire un don, Nous
  rejoindre, Contact, Newsletter — à vérifier l'état d'achèvement réel.

## 8. Consignes générales

- **Avant de commencer tout travail, à chaque session** : vérifier que le
  dépôt local est synchronisé avec GitHub.
  ```bash
  git status
  git fetch origin
  git log origin/develop..HEAD --oneline   # commits locaux pas encore poussés
  git log HEAD..origin/develop --oneline   # commits distants pas encore récupérés
  ```
  S'il y a des commits distants non récupérés : `git pull origin develop` avant
  toute modification. S'il y a des modifications locales non commitées d'une
  session précédente : les committer et pousser avant de continuer, ne jamais
  les laisser traîner ni les écraser silencieusement.
- Committer par petits blocs cohérents (`feat: ...`, `fix: ...`, `style: ...`),
  jamais un gros commit fourre-tout — l'équipe a eu des soucis de travail perdu
  faute de commits réguliers, ne pas reproduire.
- **Après chaque bloc de travail terminé et testé** : `git add`, `git commit`,
  `git push origin develop` — ne pas accumuler plusieurs chantiers non poussés.
- Ne jamais casser le design system ci-dessus en "simplifiant" vers des
  couleurs/polices par défaut.
- Toujours tester visuellement après une modification de layout ou de thème
  admin avant de commit (le mode sombre en particulier a déjà causé un bug
  d'affichage illisible sur le login).
- En cas de doute sur une donnée manquante, le signaler clairement plutôt que
  d'inventer une solution silencieuse.
