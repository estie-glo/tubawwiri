# Fondation TUBAWWIRI (TBW) — Contexte projet pour Claude Code

**Par où commencer : section 3 (refonte visuelle du site public — remarques de
la Fondatrice, 11/08/2026), rien d'autre avant. Ensuite seulement, section 4
(admin Filament), puis section 6, puis section 7.**

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

## 1bis. Documents et dossiers sources originaux

- `docs-source/` : cahier des charges complet (`Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`),
  document d'architecture de l'écosystème TUBAWWIRI (`architecture TUBAWWIRI (TBW).docx`
  — méthode CAVAMIS détaillée, doctrine des 3T, parcours de transformation
  TESIMAMA → TOLAMUKE → TELUMIÈRE), rubriques officielles de contenu
  (`rubriques TUBAWWIRI.docx` — les 10 rubriques avec leur description complète,
  prêtes à l'emploi), biographie de la fondatrice (`Biographie_Ngapout_Nana_Fadimatou_TUBAWWIRI-3.docx`),
  plan d'équipe (`PLAN_EQUIPE_TUBAWWIRI.pdf`). **Consulter avant toute décision
  de contenu ou de structure** — c'est la source de vérité, plus fiable que ce résumé.
- `remarquesprisesdetubawwiri/` : retours de la Fondatrice sur le rendu visuel
  actuel du site, pris en note manuscrite le 11/08/2026 puis retranscrits
  proprement dans `Remarques_Site_Web_Tubawiri-7.pdf` (2 pages, 4 sections ①→④).
  Les 5 photos JPEG du dossier sont les pages manuscrites originales
  (contenu identique au PDF, gardées pour référence si un doute d'interprétation
  se présente).
- `imagestubawwiri/` : visuels de marque déjà produits (Canva) — logo, posters
  par rubrique, symboles (arbre TESIMAMA/TOLAMUKE/TELUMIÈRE, éléphant), message
  de campagne. Détail d'utilisation en section 3 ci-dessous. **Ce sont des
  posters complets "prêts à publier" (logo + titre + texte + call-to-action),
  pas de simples photos de fond neutres** — ne pas les intégrer telles quelles
  en arrière-plan pleine page (le texte du poster se superposerait à celui du
  site) ; les utiliser comme référence de style/palette/mise en scène pour
  concevoir les vrais fonds du site, ou détourer/recadrer la partie photo pure
  s'il n'y a pas de texte à extraire proprement.

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

## 3. CHANTIER PRIORITAIRE N°1 — Refonte visuelle du site public (remarques Fondatrice, 11/08/2026)

**C'est la priorité absolue, avant l'admin Filament et avant tout le reste.**
La Fondatrice a relu le site en l'état et demandé une série de corrections
visuelles précises. Source complète : `remarquesprisesdetubawwiri/Remarques_Site_Web_Tubawiri-7.pdf`.
Ci-dessous, ces remarques sont regroupées par thème et traduites en tâches concrètes.

### 3.1 Corrections transverses (tout le site)
- **Logo** : sur l'image utilisée en page d'accueil, le logo affiche un
  demi-cercle de couleur or qui ne fait pas partie du logo officiel — le
  retirer (recadrer/retoucher l'asset, ou utiliser le logo officiel propre :
  voir le rendu correct dans `imagestubawwiri/lesdixrubriques.jpeg` ou
  `imagestubawwiri/Symbole de la Fondation.jpeg`, coin haut-gauche — logo TBW
  sans cercle parasite).
- **Boutons** : la forme rectangulaire à coins arrondis actuelle "ne convient
  pas" — proposer une forme plus travaillée (ex. coins coupés/chanfreinés,
  liseré or, ou pilule asymétrique) cohérente avec le style organique du reste
  de la charte. Documenter le choix dans ce fichier une fois tranché.
- **Barre de navigation** : jugée "trop simple" — enrichir visuellement (fond
  subtil, séparateurs, état actif plus marqué, éventuellement mega-menu léger
  pour les rubriques avec sous-entrées).
- **Icônes réseaux sociaux** : remplacer les liens texte Facebook/Threads
  (et vérifier les autres) par de vraies icônes (Heroicons ou SVG dédiés),
  cohérent avec le reste des réseaux déjà en icônes.
- **Pied de page** : bloc newsletter jugé "pas attrayant", ainsi que les liens
  rapides — retravailler la mise en forme (pas juste une liste de liens nus).

### 3.2 Page d'accueil
- **Domaines d'action** : remplacer le rendu actuel par un défilement animé où
  chaque domaine apparaît avec une image en fond (ou à côté) de son texte
  descriptif.
- **Méthode CAVA(MIS)** : chaque mot-clé (Comprendre, Accompagner, Veiller,
  Agir…) traité comme les domaines d'action — cadre soigné et mis en valeur.
- Appliquer la **même logique de cadres/mise en valeur** à : la doctrine des 3T
  (utiliser `imagestubawwiri/Symbole du défi TESIMAMA.jpeg`,
  `Symbole du défi TOLAMUKE.jpeg`, `Symbole du défi TELUMIERE.jpeg` comme
  inspiration visuelle par étape), la rubrique Actualités, la section Impact, et
  "Rejoignez le mouvement".

### 3.3 Qui sommes-nous / Notre approche
- Retirer la biographie de la page "Qui sommes-nous" (elle part dans sa propre
  section/page, voir 3.6).
- Reformater le contenu en **petits paragraphes**, chacun dans un **cadre
  rectangulaire**, avec une image en arrière-plan (ou à côté) illustrant le
  paragraphe. Navigation par **défilement horizontal** entre paragraphes,
  matérialisé par une **flèche à droite**.
- Appliquer exactement le même traitement à "Notre approche" (contenu déjà réel
  en base, juste le rendu à refaire).

### 3.4 Nouvelle section "Rubriques" (10 rubriques)
- Créer une section (page ou bloc dédié, à décider selon l'architecture du
  site) présentant les 10 rubriques officielles, même principe que 3.3 :
  chaque rubrique dans son cadre, avec une image adaptée — **préférence
  explicite de la Fondatrice pour une image en fond plutôt qu'à côté**,
  accompagnée d'animations.
- Contenu texte déjà prêt : `docs-source/rubriques TUBAWWIRI.docx` (nom + pitch
  de chacune des 10 rubriques).
- Références visuelles disponibles par rubrique dans `imagestubawwiri/`
  (posters Canva complets — en extraire la palette/mise en scène, pas le
  poster entier tel quel, voir note 1bis) :
  - Rubrique 1 (TUBAWWIRI Africa Watch) → `rubriqueun.jpeg`
  - Rubrique 2 (Allô Parentalité Écoute) → `rubrique2.jpeg`
  - Rubrique 3 (La Voix de l'Enfant) → `rubrique3.jpeg`
  - Rubrique 4 (TUBAWWIRI au Féminin) → `rubrique4.jpeg`
  - Rubrique 5 (TUBAWWIRI au Masculin) → `rubrique5.jpeg`
  - Rubrique 6 (Les Chroniques de la Mémoire) → `rubrique6.jpeg`
  - Rubrique 7 (Le Message TUBAWWIRI) → `editorial.jpeg` et `editorial7.jpeg`
    (deux variantes confirmées : "Message TUBAWWIRI" / "Le Message du jour")
  - Rubrique 8 (La Question TUBAWWIRI) → `rubrique8.jpeg` et `Éditorial3.jpeg`
    (variante confirmée : "La Question TUBAWWIRI" — souvenir des conflits parentaux)
  - Rubrique 9 (Les Campagnes TUBAWWIRI) → `rubrique9.jpeg`
  - Rubrique 10 (La Voix de TUBAWWIRI) → `editorial2.jpeg`, `editorial5.jpeg`,
    `editorial6.jpeg` (trois variantes confirmées : "La Clé CAVAMIS" avec
    portrait, statue + "Une semaine peut transformer une vie", "Le Regard
    TUBAWWIRI" — cohérent avec la parole officielle/éditoriaux de la fondation)
  - Vue d'ensemble des 10 en un seul visuel (utile comme référence de mise en
    page grille) : `lesdixrubriques.jpeg`
  - Plusieurs rubriques ont donc **plusieurs variantes de poster disponibles** —
    choisir celle qui s'intègre le mieux au fond/à la mise en page retenue,
    ou s'en inspirer pour un visuel recadré/détouré propre au site (pas de
    superposition de texte Canva par-dessus le texte du site, voir note 1bis).

### 3.5 Programmes, Domaines d'action, TBW Academy, TBW Consulting, Observatoire, Ressources, Actualités, Nos impacts, Médias, Faire un don
- Sur l'interface Programmes : intégrer une **image animée en arrière-plan**
  présentant les différents programmes.
- **Reproduire ce même principe** (image de fond animée/immersive) sur toutes
  les pages listées ci-dessus.
- Pages de détail (fiches Programme individuelles type "Familles résilientes",
  "Écoles résilientes"…, et fiches Domaines d'action, et pages de l'Observatoire
  — notes, analyses) : structure **image en fond + texte réparti dans de petits
  cadres avec photos à l'appui**.

### 3.6 Bibliographie / photo de la fondatrice
- Créer une section "Bibliographie" dédiée (probablement liée à ou proche de
  "Qui sommes-nous", à décider selon l'architecture retenue en 3.7) avec la
  biographie retirée de "Qui sommes-nous" (3.3) + une photo de la Fondatrice.
  Contenu texte déjà disponible : `docs-source/Biographie_Ngapout_Nana_Fadimatou_TUBAWWIRI-3.docx`.
  **Image confirmée et fournie par la Fondatrice** : `imagestubawwiri/bibliographie.jpg`
  — portrait de Mme Nana Fadimatou Ngapout (Fondatrice) avec citation
  ("Ma passion est de voir les personnes et les communautés retrouver leurs
  racines, s'éveiller à leur potentiel et faire rayonner leur lumière...") et
  signature. C'est un poster Canva complet (portrait + citation + logo) —
  comme pour les autres visuels du dossier (voir note 1bis), soit l'utiliser
  tel quel si son format convient à la section (il est déjà bien composé et
  pourrait fonctionner directement comme bloc "citation de la fondatrice" en
  haut de la section Bibliographie), soit détourer le portrait seul pour
  l'associer différemment au texte de la biographie — à trancher selon le
  rendu final voulu pour la page.

### 3.7 Architecture officielle de l'écosystème TUBAWWIRI
- Concevoir une présentation claire de l'architecture de l'écosystème (identité
  centrale, méthode CAVAMIS, doctrine des 3T, parcours de transformation
  TESIMAMA → TOLAMUKE → TELUMIÈRE). Contenu complet déjà rédigé :
  `docs-source/architecture TUBAWWIRI (TBW).docx`. Décider où cette
  présentation vit sur le site (nouvelle page dédiée, ou section enrichie sur
  "Notre approche"/accueil) — pas tranché par la Fondatrice, à proposer.

### 3.8 Page Contact
- Jugée manquer d'attrait visuel — retravailler la mise en page (garder les
  infos/formulaire existants, améliorer l'habillage).

### 3.9 Centre de ressources
- Les liens "Guide" et "Infographie" ne conviennent pas dans leur forme
  actuelle — retravailler leur présentation (cartes avec icône de type de
  ressource plutôt que liens nus, par exemple).

### 3.10 Rubrique Actualités (tous les liens)
- Les liens "Lancer la Tribu" et "Tubawiri" (dont le lien vers la méthode CAVA
  mise en action) doivent reprendre la présentation des pages Programmes :
  image en fond, caractéristiques mises en avant, texte dans un cadre soigné.
  **Plus généralement, tous les liens de la rubrique Actualités suivent cette
  même charte visuelle.**
- Revoir le contenu de la page Actualités en se basant sur le CDC complet
  (`docs-source/Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`) — plusieurs manques
  identifiés par la Fondatrice, non détaillés un par un dans les remarques :
  comparer page par page avec le CDC pour les repérer.

### 3.11 Page Médias
- Chaque élément (Galerie photo, Galerie vidéo…) doit avoir sa **propre
  interface/cadre** expliquant ce que montrent les images/vidéos affichées.
- Système de **défilement horizontal** pour passer de la galerie photo à la
  galerie vidéo (et suivants).

### Note générale sur 3.5/3.10
La Fondatrice signale "plusieurs manques" identifiés sur les pages Programmes
et Observatoire (et d'autres) en comparant au CDC complet
(`docs-source/Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`) — au-delà des points
listés ci-dessus, faire une relecture comparative CDC ↔ site avant de considérer
le chantier 3 terminé.

## 4. CHANTIER PRIORITAIRE N°2 — Admin Filament : le rendre beau et dynamique

**À traiter une fois le chantier 3 terminé.** L'admin Filament est actuellement
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

## 5. Système de traduction bilingue — RÈGLE OBLIGATOIRE

Fichiers : `resources/lang/{fr,en}/site.php` (nav/footer/accueil),
`resources/lang/{fr,en}/forms.php` (labels formulaires),
`resources/lang/{fr,en}/pages.php` (intros de pages, libellés de champs).
Utiliser `__('fichier.cle')` pour tout texte fixe, jamais de français en dur.

Contenu en base avec colonne `_en` (ex: `title_en`, `summary_en`) : toujours
afficher avec :
```php
{{ app()->getLocale() === 'en' && $model->champ_en ? $model->champ_en : $model->champ_fr }}
```

**Limitation connue, à corriger si le temps le permet** — mise à jour après
vérification en base (2026-08-06), cette note était partiellement obsolète :
- `ImpactStat` et `Testimonial` **ont déjà** leurs colonnes `_en`, remplies
  avec du vrai contenu traduit (vérifié en base + à l'écran en FR et EN) —
  ne sont donc plus concernés par cette limitation.
- `Resource` (Centre de ressources) **a déjà** `title_en`/`description_en`,
  remplies elles aussi — plus concerné non plus.
- `MediaItem` reste bien mono-langue (`title` sans `_en`) — limitation
  toujours réelle sur ce modèle.
- Les champs longs `enjeux_fr`, `objectifs_fr`, `actions_fr`,
  `publics_cibles_fr`, `resultats_attendus_fr`, `appel_partenariat_fr` sur
  `ActionDomain` restent mono-langue — mais avant d'ajouter des colonnes
  `_en`, voir le point "Audit contenu placeholder" de la section 6 : le
  contenu FR actuel de ces champs est lui-même à refaire (texte gabarit,
  pas de vrai contenu), ajouter la traduction anglaise n'aurait pas de sens
  tant que le FR n'est pas le vrai contenu.
- Plusieurs champs longs sur `Program` restent mono-langue aussi (sauf
  `title_fr`/`title_en`) : `probleme_fr`, `public_concerne_fr`,
  `objectifs_fr`, `activites_fr`, `beneficiaires_fr`, `indicateurs_fr`,
  `resultats_attendus_fr`, `partenaires_souhaites_fr` — contenu FR ici
  vérifié réel et distinct par programme (pas de gabarit), donc équiper de
  colonnes `_en` serait pertinent si on veut aller au bout du bilinguisme.

## 6. RESTE À FAIRE POUR LIVRER (hors chantiers 3/4, hors déploiement section 7)

- [ ] **Admin Filament : refonte visuelle** (voir section 4, priorité n°2)
- [x] **`ResourceResource`** : fait — la ressource Filament pour le modèle
      `Resource` (Centre de ressources) existe déjà sous le nom
      `ResourceItemResource` (`app/Filament/Resources/ResourceItemResource.php`,
      ajoutée dans le commit `720d7a1`). CRUD complet, catégorie en badge,
      formulaire regroupé en sections (voir section 4).
- [x] **Rôles/permissions** : fait — retesté avec un compte `role = editor`,
      la restriction était toujours active côté UI (bouton Supprimer caché
      sur les 6 ressources) mais reposait uniquement sur `->visible()`, sans
      barrière serveur réelle. Ajout de vraies Policies Laravel
      (`app/Policies/{ContactMessage,Donation,JoinRequest,PartnerRequest,
      QuoteRequest,Subscriber}Policy.php`) + `->authorize()` sur chaque
      `DeleteAction` : `delete`/`deleteAny` réservés à `role = admin`,
      view/update/viewAny inchangés pour les editors.
- [x] **Newsletter** : audité — le cœur (formulaire footer, route/contrôleur,
      anti-doublon, migration, honeypot, `SubscriberResource`) était déjà
      solide, contrairement à ce que laissait penser le commit Cursor. Deux
      manques réels corrigés : (1) 13 clés de traduction absentes cassaient
      l'affichage du bloc newsletter et de plusieurs pages (Médias,
      Ressources, Impacts) en FR et EN — la clé brute s'affichait en prod ;
      (2) aucune désinscription n'existait — ajoutée
      (`/{locale}/newsletter/desabonnement`, désactive `is_active`, lien
      dans le footer). Reste mineur, non bloquant : pas de filtres/actions
      groupées sur `SubscriberResource`, pas d'email de confirmation à
      l'inscription.
- [x] **Anti-spam formulaires** : vérifié sur les 6 formulaires publics +
      newsletter. Deux trous trouvés et corrigés : "Nous rejoindre"
      n'avait aucun honeypot (ni champ, ni vérification côté contrôleur) ;
      "Faire un don" vérifiait le honeypot côté contrôleur mais le champ
      n'existait pas dans la vue, donc la vérification ne se déclenchait
      jamais. Contact, Partenariat, Devis, Inscription Academy et
      Newsletter étaient déjà correctement protégés (champ caché +
      `RejectsHoneypot`). Testé en soumettant avec le champ honeypot
      rempli : rejet silencieux confirmé, aucun enregistrement créé.
- [x] **Responsive mobile/tablette** : testé sur les 15 pages publiques
      (routes `GET {locale}/...` de premier niveau) à 375px (mobile) et
      768px (tablette) : aucun débordement horizontal détecté
      automatiquement, et vérifié visuellement (grilles qui s'empilent
      correctement, formulaires lisibles, menu hamburger fonctionnel en
      dessous de 1280px). Aucun bug réel trouvé — pas seulement l'accueil,
      comme le craignait le commit Cursor.
- [x] **Audit contenu placeholder** : audité — pas de `Lorem ipsum` trouvé,
      mais **`ActionDomain` (les 7 pages "Domaines d'action") contient du
      texte gabarit non remplacé**, à traiter avec la Fondatrice avant
      publication :
      - `objectifs_fr` et `actions_fr` sont **mot pour mot identiques** sur
        les 7 domaines ("Sensibiliser, former et accompagner les acteurs
        locaux." / "Ateliers, groupes de parole, campagnes et
        partenariats.").
      - `enjeux_fr`, `publics_cibles_fr`, `resultats_attendus_fr`,
        `appel_partenariat_fr` suivent le même patron générique avec juste
        le nom du domaine inséré ("Renforcer les réponses communautaires
        face aux défis liés à {domaine}.").
      - Champs `_en` correspondants : NULL sur les 7 (à la différence
        d'`ImpactStat`/`Testimonial`/`Resource`, voir section 5 corrigée
        ci-dessus).
      - La liste des domaines ne correspond pas non plus au CDC
        (`docs-source/Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`, page
        "Domaines d'action") : le CDC prévoit 8 domaines dont *Jeunesse* et
        *Recherche et innovation sociale*, absents de la base ; la base a
        en plus *Formation & renforcement des capacités*, absent du CDC.
      - Le CDC ne fournit que la structure attendue par page (enjeux,
        objectifs, actions, publics cibles, résultats attendus, appel à
        partenariat), pas le contenu rédigé — impossible de le reconstituer
        depuis `docs-source/`, il faut le vrai contenu de la Fondatrice.
      - **`BROUILLON_domaines_action.md`** (racine du projet) : brouillon de
        contenu réel pour les 7 fiches, rédigé à partir du contexte déjà
        validé sur le site (slogan, 3T, CAVAMIS, ton des Programmes déjà en
        place). Explicitement **non appliqué en base** — à faire relire et
        valider par la Fondatrice avant de le copier dans `ActionDomain`
        via l'admin. Ne traite pas l'écart de liste de domaines ci-dessus,
        volontairement laissé à sa décision.
      - Reste du contenu (Programmes, Articles, Rapports, Formations,
        pages institutionnelles) vérifié : rédigé et distinct, pas de
        gabarit détecté ailleurs.
- [x] **Revue Actualités vs CDC** (section 3.10) : comparé au CDC
      (`docs-source/Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`, section
      Actualités). Écarts trouvés, laissés en l'état (décision Fondatrice) :
      - **Catégories inventées, ne correspondent pas au CDC** : les 10
        catégories en base (`Category`) reprennent les 10 rubriques
        officielles (Santé mentale communautaire, Allô Parentalité
        Écoute, etc.), alors que le CDC prévoit une liste différente
        pour Actualités : *Afrique, Cameroun, Monde, Santé mentale,
        Parentalité, Protection de l'enfant, Leadership féminin,
        Citations africaines, Vie de la Fondation* (section 8 du CDC)
        / *Afrique, Monde, Santé mentale, Parentalité, Droits de
        l'enfant, Leadership féminin, Citations africaines,
        Interviews* (section 3). Aucune des deux ne correspond aux
        catégories actuelles — à trancher avec la Fondatrice (garder
        les rubriques comme catégories, ou aligner sur le CDC).
      - **Seulement 2 articles en base** ("Lancer la Tribu TUBAWWIRI",
        "La méthode CAVAMIS en action"), tous deux sans catégorie
        assignée (le seeder référence des slugs de catégorie qui
        n'existent pas). Le CDC recommande un rythme éditorial (1
        analyse/semaine, 3-5 posts courts/semaine, 1 rapport tous les
        2-3 mois) — volume actuel très en dessous, contenu réel à
        produire par la Fondatrice, pas inventé ici.
      - **Types de contenu absents** : "Citations africaines" et
        "Interviews", prévus par le CDC, n'existent pas comme type de
        contenu dans le modèle `Article` actuel.
      - Champ `cover_image` : présent sur `Article` mais vide sur les 2
        articles existants — les nouvelles cartes (voir commit visuel
        3.10) utilisent une photo de secours en attendant.
- [x] **QA formulaires bout-en-bout** : les 6 formulaires soumis avec des
      données de test (supprimées ensuite), chacun vérifié en base
      (`ContactMessage`, `PartnerRequest`, `QuoteRequest`,
      `TrainingEnrollment`, `JoinRequest`, `Donation` — un enregistrement
      créé à chaque fois) et côté email : SMTP réellement configuré (Gmail,
      voir `.env`), test d'envoi direct réussi, et aucune des 6 soumissions
      n'a déclenché le `Log::warning` d'échec d'envoi que chaque contrôleur
      pose autour de `Mail::send()`. Six emails de notification "[QA]"
      envoyés à `estellewandji67@gmail.com` pendant ce test, à nettoyer
      manuellement dans la boîte mail.
- [x] **Liens morts / 404** : crawl automatisé des 15 pages publiques en FR
      et EN + tous leurs liens internes (96 liens uniques découverts). Un
      lien cassé trouvé et corrigé : "Communiqué de lancement" et "Dossier
      de presse TUBAWWIRI" sur `/medias` pointaient vers `/storage` (404,
      `file_path` NULL en base, vue non gardée par `@if`) — voir commit
      `2f2ae5e`. Après correction : 0 lien cassé sur les 96.
- [x] **Checklist de recette du CDC** — repassée point par point
      (`docs-source/PLAN_EQUIPE_TUBAWWIRI.pdf`, section 5) :
      - [x] Site correct sur mobile/tablette/ordinateur — voir responsive
            ci-dessus
      - [x] Toutes les pages du menu existent — couvert par le crawl liens
            morts ci-dessus (header, menu mobile, footer inclus)
      - [x] Versions FR/EN fonctionnent — testé tout au long de cette session
      - [x] Formulaires envoient à la bonne adresse — `mail_to` dans
            `config/tubawwiri.php` route bien chaque formulaire vers sa
            propre clé `.env` (`MAIL_TO_CONTACT`, `_PARTNERSHIP`, `_ACADEMY`,
            `_CONSULTING`, `_DONATIONS`, `_JOIN`, `_NEWSLETTER`) — toutes
            pointent vers la même adresse pour l'instant (normal, emails
            pro pas encore créés, voir section 7)
      - [x] Bouton WhatsApp fonctionne — `href` vérifié (`wa.me/237676869191`)
      - [x] Images pas floues — visuels de marque (`public/images/`) en
            bonne résolution (1000-1900px) ; aucune image de contenu
            utilisateur encore uploadée (`storage/app/public` vide) donc
            rien d'autre à vérifier pour l'instant, symlink storage OK
      - [ ] Certificat SSL actif — **N/A pour l'instant**, pas d'hébergement
            réel (section 7)
      - [ ] Sauvegardes actives — **N/A pour l'instant**, pas d'hébergement
            réel (section 7)
      - [x] Un admin peut publier seul un article — testé de bout en bout
            via l'interface (création → publication → visible sur
            `/actualites` et sa page dédiée)
      - [x] Liens réseaux sociaux fonctionnent — les 7 liens (Facebook,
            Instagram, YouTube, TikTok, LinkedIn, Threads, chaîne WhatsApp)
            bien formés vers de vrais comptes ; profils externes non
            vérifiés un par un
      - [x] Pages don/devis/inscription opérationnelles — couvert par la QA
            formulaires bout-en-bout ci-dessus

      **Effet de bord repéré, à corriger à l'occasion (pas bloquant)** :
      `.env` contient des clés dupliquées (`TBW_LINKEDIN`, `TBW_TIKTOK`,
      `TBW_THREADS`, `TBW_WHATSAPP` apparaissent deux fois, une fois vides
      puis une fois avec la vraie valeur). Ça fonctionne aujourd'hui (la
      dernière occurrence gagne), mais c'est fragile si quelqu'un modifie
      la mauvaise occurrence plus tard — à nettoyer en gardant une seule
      ligne par clé.

## 7. Ordre de priorité (mis à jour 12/08/2026)

1. **Section 3** — Refonte visuelle du site public (remarques Fondatrice) —
   priorité absolue, à traiter en premier.
2. **Section 4** — Admin Filament (refonte visuelle) — chantier déjà en cours,
   à reprendre juste après la section 3.
3. **Section 6** — Reste de la liste "à faire pour livrer".
4. Sujets ci-dessous, qui dépendaient jusqu'ici d'informations côté cliente
   mais peuvent être avancés autant que possible (préparer le code/la
   configuration, même si certaines valeurs réelles — domaine, comptes
   marchands, identifiants — ne seront connues que plus tard) :
   - Domaine `tubawwiri.org`, hébergement, SSL, sauvegardes
   - Intégration réelle des paiements MTN MoMo / Orange Money (au-delà de
     l'affichage actuel des numéros personnels en attendant, voir
     `config/tubawwiri.php` → `donations`)
   - Emails professionnels (`contact@tubawwiri.org`, etc.)
   - Google Analytics (le code est prêt, `config('services.google_analytics_id')`
     ne demande qu'un identifiant réel)

## 8. Équipe et répartition d'origine (pour contexte historique)

- **Wandji** : fondations (Accueil, Qui sommes-nous, Notre approche), layout,
  design system, admin Filament, emails, rôles, SEO — lead intégration.
- **Bryan** : Domaines d'action, Programmes, Observatoire, Centre de ressources,
  Nos impacts, Médias — lot terminé.
- **Sibefeu** : TBW Consulting, TBW Academy, Actualités, Faire un don, Nous
  rejoindre, Contact, Newsletter — à vérifier l'état d'achèvement réel.

## 9. Consignes générales

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
- En cas de doute sur une donnée manquante ou une correspondance image/rubrique
  non vérifiée (voir section 3.4), le signaler clairement plutôt que d'inventer
  une solution silencieuse.
