# Fondation TUBAWWIRI (TBW) — Contexte projet pour Claude Code

**Par où commencer, session en cours (27/08/2026)** : la section 3 (3.1 à
3.14 — refonte visuelle du site public) est **terminée** et **fusionnée sur
`develop`** (branche `refonte-visuelle-remarques-v3`, mergée via la PR #10 le
26/08 — la note précédente disant "pas encore fusionnée" était obsolète).
Depuis, deux commits directement sur `develop` (`b09f057`, `10f249d`, 26/08)
ont corrigé des bugs réels du **déploiement de test Render**, sans lien avec
la refonte visuelle — voir la nouvelle section 10 pour l'état complet et les
pièges connus **avant de retoucher au Dockerfile ou de diagnostiquer un
souci sur le lien de test**.

Trois points restent ouverts :
1. **Architecture, volets 7 à 11** (TBW Academy, TBW Consulting,
   Communication, Campagnes, Ressources) attendent encore leur vraie photo —
   quota Canva retesté le 17/08, **toujours bloqué** (3 essais au total
   maintenant : 15/08, 16/08, 17/08, toujours refusé). Panneau neutre
   "Photo à venir" conservé en attendant. **Nouvelle session : retester
   `generate-design` en premier ; si le quota est revenu, terminer ces 5
   photos + regénérer les 6 photos de Domaines d'action en plus haute
   résolution (voir 3.14), sinon passer directement à la section 4 (admin
   Filament).**
2. **Bibliographie de la Fondatrice — décision en attente** : deux versions
   construites en parallèle pour comparaison visuelle (voir 3.14) —
   `/bibliographie-fondatrice` (Option B, 4 pages corrigées) et
   `/bibliographie-fondatrice-apercu` (Option A, page unique façon mockup,
   temporaire). **Donner les deux liens à la Fondatrice ; une fois son choix
   fait, supprimer l'option non retenue** (route `founder.apercu` + vue
   `apercu-unique.blade.php` si Option B gagne ; sinon retirer
   `founder.show`/`{position}` et le mécanisme page-swipe-card/autoplay sur
   cette page si Option A gagne).
3. **Lien de test Render peut sembler "en panne" au début de chaque
   session** — ce n'est presque toujours pas un vrai bug : voir la
   check-list de la section 10.1 avant de commencer un diagnostic.

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
- [x] **Logo** — **fait, remplacer directement** : l'anneau doré plein qui
  entourait l'arbre sur la bannière d'accueil a été retiré (rayons fins,
  arbre, racines et texte conservés intacts, aucun autre défaut). Nouveau
  fichier prêt à l'emploi : `imagestubawwiri/banner-tubawwiri-corrige.png`
  (à copier vers `public/images/banner-tubawwiri.jpeg`, en adaptant le nom/
  format si besoin — vérifier que `hero-kenburns` et le reste du CSS
  s'appliquent toujours correctement après le remplacement). Si le même
  anneau existe sur d'autres occurrences du logo ailleurs sur le site,
  vérifier au cas par cas et appliquer le même correctif.
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
- Créer une page d'index présentant les 10 rubriques officielles en cartes
  d'aperçu avec bouton "LIRE LA SUITE →", **chaque rubrique ayant sa propre
  page complète dédiée** (confirmé explicitement le 14/08 : "même les
  rubriques c'est pareil" — même principe que 3.12.5, pas une simple grille
  statique), avec une image en fond — **préférence explicite de la
  Fondatrice pour une image en fond plutôt qu'à côté**, accompagnée
  d'animations, et navigation précédent/suivant entre les 10 pages détail.
  Voir `imagestubawwiri/exempleinterfacenosrubriques.png` pour la référence
  visuelle du bloc d'aperçu sur la page d'accueil/index (section 3.12.4).
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

### 3.12 Deuxième vague de remarques de la Fondatrice (13/08/2026)

Après un premier passage sur le site, la Fondatrice a envoyé une nouvelle série
de retours, certains globaux (à appliquer partout, y compris rétroactivement
sur 3.1–3.3), d'autres précis page par page avec des **images de référence
"à copier conformément"**. Source manuscrite complète :
`remarquesprisesdetubawwiri` n'est plus le seul dossier de remarques — voir
aussi `remarquestreizeaouT2026/` (5 fichiers : 2 pages collées + 3 photos
WhatsApp) pour le texte original si un doute d'interprétation se présente ici.

**Statut (15/08/2026) : traité en intégralité, y compris les deux
clarifications du 15/08 (liste des 12 volets Architecture + visuels fidèles
au mockup, mockup TBW Academy corrigé), sur la branche
`refonte-visuelle-remarques-v2`, pas encore fusionné sur `develop`.**
Détails d'implémentation utiles pour la suite :
- **Architecture, visuels des 12 volets** : photo "Identité centrale"
  recadrée depuis `imagestubawwiri/WhatsApp Image 2026-08-11 at
  12.52.35.jpeg` (élagage du texte Canva) →
  `public/images/architecture/identite-baobab.jpg`. Les 4 diagrammes
  (CAVAMIS, Doctrine des 3T, Les trois composantes, Principe des 10
  rubriques) sont générés en SVG via le nouveau composant
  `<x-radial-diagram>` plutôt qu'en images statiques (fichiers sources
  exacts introuvables séparément dans `imagestubawwiri/`). Communication/
  Campagnes/Ressources/Observatoire : grande icône thématique sur fond
  dégradé, même logique faute de photo source dédiée.
- **TBW Academy, liste des formations** : confirmé non-erroné — les
  intitulés de formation reprennent volontairement les mêmes noms que les
  domaines d'action (cohérent avec le principe des 10 rubriques
  universelles). Reste un écart de **contenu** (pas de rendu) : seules 4
  formations existent en base sur les 5 attendues par le mockup
  (« Résilience humaine » manquante) — à créer via l'admin quand la
  Fondatrice aura le contenu réel (pas inventé ici).

#### 3.12.1 Règles globales (à appliquer partout, y compris sur le travail déjà fait en 3.1–3.3)

- **Forme des boutons** : la forme actuelle ne convient toujours pas.
  Référence exacte donnée par la Fondatrice : `imagestubawwiri/formesdesboutons.png`
  (capture d'écran ChatGPT où elle a entouré en rouge la barre de saisie du
  bas — "Répondre à ChatGPT") : un bouton en **pilule très arrondie**
  (`border-radius` proche de la moitié de la hauteur), pas le rectangle à
  coins légèrement arrondis actuel. Appliquer à tous les boutons du site
  (CTA "Faire un don", "S'inscrire" newsletter, boutons de formulaire, etc.).
- **Forme des cadres** : référence exacte donnée : `imagestubawwiri/formescadres.png`
  (même capture ChatGPT, cette fois le bloc gris arrondi contenant la liste
  de fichiers est entouré en vert) : un cadre à **coins très arrondis**
  (beaucoup plus que le style "séparateurs fins" actuellement en place en
  section 2 du présent fichier — la Fondatrice priorise sa préférence
  visuelle explicite ici sur la règle plus sobre écrite en section 2).
  **Tous les cadres du site doivent reprendre ce style** : cadres des
  domaines d'action, cadres de la doctrine des 3T, cadre "Rejoindre le
  mouvement", cadre des liens Facebook, cadre newsletter, et plus
  généralement tous les cadres de toutes les pages.
- **Couleur violette** : la couleur violette de fond actuellement utilisée
  quelque part sur le site (`#3B2560` de la section 2, ou une teinte dérivée)
  "fait trop vieux" selon la Fondatrice. **Remplacement confirmé (14/08)** :
  un **beige crème très clair** — reprendre la couleur crème déjà présente
  dans le design system (`#F6F1E4`, section 2) ou une variante encore plus
  claire si besoin de contraste avec le fond existant, plutôt qu'inventer une
  teinte non validée. Le violet `#3B2560` reste tel quel comme accent ponctuel
  rare (section 2) — c'est son usage en aplat de fond qui pose problème,
  pas la couleur en tant que touche d'accent.

#### 3.12.2 Correction confirmée

- [x] **Bannière d'accueil** : Estelle a déjà remplacé
  `public/images/banner-tubawwiri.jpeg` par la version sans anneau doré
  (confirmé fonctionnel de son côté) — ne pas revenir dessus, sauf si la
  forme des boutons/cadres ci-dessus s'applique aussi à des éléments
  superposés à la bannière (CTA, badges).

#### 3.12.3 Sources d'images officielles par domaine d'action et par doctrine 3T

La Fondatrice a fourni de meilleures images, **une par élément, nommée
exactement d'après l'élément concerné**, dans `imagestubawwiri/` :
- Domaines d'action : `santementalecommunautaire.jpeg`, `resiliencehumaine.jpeg`,
  `parentalitepositive.jpeg`, `protectiondel'enfant.jpeg` (apostrophe dans le
  nom de fichier, attention en shell), `leadershipfeminin.jpeg`,
  `developpementcommunautaire.jpeg`, `jeunesse.jpeg`,
  `rechercheetinovationsociale.jpeg`, `communauteresilientes.jpeg`,
  `ecolesresilientes.jpeg`, `famillesresilientes.jpeg` — à faire correspondre
  au bon domaine d'action par le nom (couvre aussi l'écart de liste de
  domaines déjà noté en section 6 "Audit contenu placeholder" : Jeunesse et
  Recherche/innovation sociale ont maintenant leur image, donc probablement
  à créer comme vrais domaines si la Fondatrice les valide).
- Doctrine des 3T : deux jeux d'images fournis —
  `symboletelumiere.jpeg`, `symboletolamuke.png`, `symboletesimama.jpeg`
  (à essayer en premier) et, si le rendu ne convient pas dans les cadres,
  `telumiere.jpeg`, `tolamuke.jpeg`, `tesimama.jpeg` (deuxième choix).
- Carte "Faire un don" / "Nous rejoindre" / "Devenir partenaire" : utiliser
  `imagestubawwiri/femmeaveclance.png` (statue en bronze d'une femme guerrière
  avec une lance, déjà présente en fond sur `Qui sommes nous?.jpeg` — la
  Fondatrice la préfère à l'image actuellement utilisée sur ces trois cartes).
- Page Bibliographie de la Fondatrice : photo de fond dédiée
  `imagestubawwiri/photodelafondatrice.jpeg` (différente du portrait avec
  citation `bibliographie.jpg` déjà utilisé en section 3.6 — utiliser
  `photodelafondatrice.jpeg` en arrière-plan de bandeau/hero, et
  `bibliographie.jpg` peut rester pour un bloc citation dans la page).

#### 3.12.4 Pages avec un exemple visuel "à copier conformément"

**Consigne de la Fondatrice, à prendre au pied de la lettre** : "je veux que
chaque page soit la copie conforme de son exemple." Ces images sont des
mockups qu'elle a validés — prendre la structure, la mise en page, le
placement des éléments (pas nécessairement chaque pixel de couleur/police, qui
restent ceux du design system en section 2) comme cible exacte :

- **Qui sommes-nous** (`imagestubawwiri/exemplequisommesnous.jpeg`) et
  **Notre approche** (`exemplenotreapprochepageun.jpeg` et
  `exemplenotreapproche.jpeg`) : confirment et précisent 3.3 —
  carrousel de cartes numérotées ("01/05" etc.), icône ronde à gauche du
  titre, titre + court texte, photo en fond à droite (Qui sommes-nous) ou en
  filigrane (Notre approche), flèches précédent/suivant de chaque côté,
  points de pagination en bas. Nombre de cartes = nombre de paragraphes
  répartis (voir 3.12.5 sur le nombre exact de cadres/pages).
- **Bibliographie de la Fondatrice** (`exemplepagebibliographie.png`) : bandeau
  hero avec photo (voir 3.12.3), titre "Bibliographie de la Fondatrice",
  sous-titre fonction, bandeau de 3 qualifications avec icônes, puis corps de
  texte en deux colonnes (texte + photo/logo), puis citation en encadré doré
  en bas. **Attention** : cet exemple montre un rendu en une seule page
  scrollable, alors que la remarque manuscrite (3.12.5) demande explicitement
  un découpage en plusieurs vraies pages avec navigation précédent/suivant —
  les deux ne sont pas forcément contradictoires (l'exemple peut illustrer le
  style visuel des cadres/couleurs à reprendre pour la page d'aperçu et pour
  chaque page détail, tandis que 3.12.5 prime pour la structure de
  navigation). Nombre de pages à déterminer en comptant les paragraphes
  réels du contenu source (`docs-source/Biographie_Ngapout_Nana_Fadimatou_TUBAWWIRI-3.docx`),
  pas en supposant un nombre fixe (voir 3.12.5).
- **Architecture de l'écosystème TBW** (`interfacearchitecturedelecosystemetbw.png`) :
  confirme et précise 3.7 — **liste des 12 éléments confirmée le 15/08 (grille
  4 colonnes × 3 lignes dans le mockup, pas 3×4)**, dans l'ordre exact :
  1. Identité centrale — 2. Fondement conceptuel – La Méthode CAVAMIS —
  3. Doctrine des 3T — 4. Les trois composantes de l'écosystème —
  5. Principe des 10 rubriques universelles — 6. Fondation TUBAWWIRI —
  7. TBW Academy — 8. TBW Consulting — 9. Communication — 10. Campagnes —
  11. Ressources — 12. Observatoire Africain de la Résilience.
  Numérotées "Volet 0X/12", flèches précédent/suivant, photo ou schéma en
  fond selon la carte. Contenu texte détaillé :
  `docs-source/architecture TUBAWWIRI (TBW).docx` (déjà référencé en 3.7).
  **Le point d'incertitude précédent (12e élément non identifié) est résolu
  — les 12 pages peuvent être finalisées avec cette liste, plus besoin de
  deviner.** **Précision du 15/08 : "copie conforme" veut dire ici copie
  visuelle exacte, y compris les images/schémas de chaque carte du mockup**
  (le baobab pour Identité centrale, le diagramme circulaire CAVAMIS, le
  diagramme des trois composantes, le schéma des 10 rubriques, les photos
  pour Fondation TUBAWWIRI/TBW Academy/TBW Consulting, la photo micro pour
  Communication, la photo poings levés pour Campagnes, la photo ordinateur/
  bureau pour Ressources, la carte Afrique pour l'Observatoire) — pas
  seulement la structure et le texte. Reproduire chaque page en s'appuyant
  sur ces visuels précis, quitte à regénérer des images équivalentes si les
  fichiers sources exacts du mockup ne sont pas disponibles séparément dans
  `imagestubawwiri/`.
- **Pied de page** (`exemplepieddepage.jpeg`) : confirme et précise le point
  footer de 3.1 — 4 colonnes (logo+description+citation, liens rapides avec
  icônes et chevrons, réseaux sociaux en icônes rondes + contact, carte
  newsletter avec champ email et bouton pilule doré "S'INSCRIRE").
- **Pages avec exemple direct, une image = une page, à reproduire fidèlement** :
  `exempleinterfaceactualites.jpeg` (Actualités), `exempleinterfacecontact.jpeg`
  (Contact, précise 3.8), `exempleinterfacefaireundon.jpeg` (Faire un don),
  `exempleinterfacemedias.jpeg` (Médias, précise 3.11 — remplace la photo de
  fond jugée moche, voir 3.12.6), `exempleinterfacenosdomainesactionsurpagedaccueil.png`
  (bloc Domaines d'action sur l'accueil, précise 3.2),
  `exempleinterfacenosrubriques.png` (section 10 Rubriques, précise 3.4),
  `exempleinterfacenotreimpact.jpeg` (section Impact, précise 3.2),
  `exempleinterfacenousrejoindre.jpeg` (Nous rejoindre),
  `exempleinterfaceobservatoire.jpeg` (Observatoire), `exempleinterfaceprogramme.png`
  (grille Programmes, précise 3.5), `exempleinterfaceressources.jpeg`
  (Centre de ressources, précise 3.9), `exempleinterfacetbwacademy.png` et
  `exempleinterfacetbwacademysantementalecommunautaire.jpeg` (TBW Academy,
  page liste + page détail d'un module), `exempleinterfacetbwconsulting.jpeg`
  (TBW Consulting), `exempleinteracedomaineaction.png` (page Domaines
  d'action, précise 3.5).
- **Pages de détail génériques** (fiches individuelles accessibles depuis les
  listes) : `exemplepagedesliensdestypesdeprogrammes.png` (fiche détail d'un
  programme) et `exemplespagesdesliensdestypesdedomainesdaction.png` (fiche
  détail d'un domaine d'action) — structure de référence pour les pages liées
  depuis Programmes et Domaines d'action (voir aussi 3.12.6 sur les cadres
  enjeux/objectifs/actions/cibles/résultats attendus).

#### 3.12.5 Principe du découpage en cadres/pages avec navigation (précise 3.3, 3.4, 3.6, 3.7)

**Précision importante confirmée le 14/08 par la Fondatrice, corrige la
lecture initiale ci-dessous** : ce n'est pas un simple carrousel JS qui fait
défiler du contenu à l'intérieur d'une seule URL. Le principe est **1 cadre =
1 vraie page indépendante** (sa propre route/URL), avec :
- Une **page principale/index** qui affiche les cadres en aperçu, comme des
  cartes de résumé, chacune avec un bouton **"LIRE LA SUITE →"**.
- Cliquer sur une carte mène à sa **page détaillée complète**, avec le même
  en-tête et le même style TBW que le reste du site, un grand bandeau, le
  contenu détaillé, et une **navigation "précédent / suivant"** entre les
  pages de la série (pas seulement entre l'aperçu et le détail — on doit
  pouvoir aller de la page détail 3 à la page détail 4 directement).
- C'est exactement le principe déjà implémenté sur **"Qui sommes-nous"**
  (référence confirmée par la Fondatrice) — reproduire la même mécanique de
  routes/navigation sur toutes les séries de cadres du site, notamment :
  **Notre approche**, **Bibliographie de la Fondatrice**, **Architecture de
  l'écosystème TBW** (12 pages, voir 3.12.4), et **les 10 Rubriques**
  ("même les rubriques c'est pareil" — confirmé explicitement) — chaque
  rubrique a sa propre page complète, pas juste une carte sur une grille.
- Repose la question pour les pages "liens" (santé mentale communautaire, et
  chaque page de lien similaire pour Programmes, Nous rejoindre…) où chaque
  élément (enjeux, objectifs, actions, cibles, résultats attendus) doit
  suivre le même principe : vraie page dédiée + navigation précédent/suivant,
  pas un scroll interne à un seul cadre.
- **Important, sur le nombre de pages** : dans une remarque précédente, la
  Fondatrice avait donné "8 cadres → 8 pages" comme illustration du principe,
  **pas comme un nombre fixe à appliquer partout** — elle l'a explicitement
  corrigé le 14/08 ("où je parlais de 8 pages c'était un exemple, il faut
  vérifier avant d'appliquer"). **Pour chaque section, compter le nombre réel
  de paragraphes/idées distincts dans le contenu source
  (`docs-source/`, contenu déjà en base, ou l'exemple visuel fourni) plutôt
  que de supposer un nombre.** Par exemple pour l'Architecture de
  l'écosystème, le nombre confirmé par l'exemple visuel et la Fondatrice est
  bien 12 (voir 3.12.4) — mais ce chiffre est spécifique à cette section, pas
  une règle générale.
- **Sur les images d'exemple qui montrent plusieurs pages à la fois**
  (ex. `interfacearchitecturedelecosystemetbw.png`, qui contient 12
  miniatures de pages différentes dans une seule image) : chaque miniature
  représente **sa propre page complète et indépendante**, pas une carte
  parmi d'autres sur une seule page qui défile. Regarder chaque miniature
  individuellement (zoomer si besoin) pour identifier précisément à quelle
  page/quel contenu elle correspond avant de coder — ne pas supposer la
  correspondance à l'aveugle.

#### 3.12.6 Autres corrections précises

- **Page Médias** : la photo utilisée en fond est jugée moche par la
  Fondatrice — remplacer par une image plus adaptée (voir
  `exempleinterfacemedias.jpeg` pour la référence attendue, section 3.12.4).
- **Toutes les interfaces / images de fond en général** : la Fondatrice
  signale que les images de fond ne conviennent pas sur plusieurs interfaces
  au-delà de celles déjà citées — **consigne explicite : demander l'image à
  utiliser plutôt que d'en choisir une au hasard**, page par page, si aucun
  exemple ni aucune image nommée dans `imagestubawwiri/` ne couvre déjà le cas.
- **Liens de la rubrique Actualités** : chaque lien doit mener vers une page
  listant les publications correspondant au thème du lien (pas une page
  vide/statique) — confirme et précise 3.10.
- **Mockup `exempleinterfacetbwacademy.png` — corrigé par la Fondatrice le
  15/08**, remplacé par une version cohérente (bandeau + contenu correspondent
  bien à TBW Academy maintenant). Le problème signalé ci-dessus est résolu,
  utiliser le fichier tel quel comme référence "à copier conformément"
  comme les autres.

#### 3.12.7 Preuve visuelle de l'écart actuel sur "Notre approche"

Capture d'écran réelle du site local fournie par la Fondatrice (pas un
mockup) : `imagestubawwiri/WhatsApp Image 2026-08-13 at 13.26.17 (1).jpeg`
(URL visible dans la capture : `127.0.0.1:8000/fr/notre-approche`). Elle
montre l'état actuel de la page "Notre approche" : les 5 cartes (Méthode
CAVAMIS, Doctrine des 3T, TESIMAMA, TOLAMUKE, TELUMIÈRE) s'affichent **toutes
côte à côte simultanément** sur une grille, avec une seule flèche
précédent/suivant globale en bord d'écran — ce qui ne correspond pas au
rendu attendu (`exemplenotreapprochepageun.jpeg`, section 3.12.4) où une
seule carte occupe toute la largeur à la fois, agrandie et détaillée, avec
navigation entre elles. À corriger selon 3.12.5 (vraies pages/vues
indépendantes, une par carte).

### Note générale sur 3.5/3.10
La Fondatrice signale "plusieurs manques" identifiés sur les pages Programmes
et Observatoire (et d'autres) en comparant au CDC complet
(`docs-source/Dossier_Complet_Site_Web_TUBAWWIRI-20.pdf`) — au-delà des points
listés ci-dessus, faire une relecture comparative CDC ↔ site avant de considérer
le chantier 3 terminé.

### 3.13 Troisième vague : comparaison stricte mockup par mockup (16/08/2026)

Consigne explicite de la Fondatrice, à prendre au sens strict : "copie
conforme" veut dire **identique** au mockup — mêmes images, même placement,
même contenu visuel, pas juste une structure proche. Consigne appliquée page
par page à tout ce qui a été livré en 3.1–3.12, plus les nouvelles demandes
manuscrites de `remarquesquizeaout2026/` (transcrites ci-dessous). Travail
fait sur la branche `refonte-visuelle-comparaison-stricte` (base `develop`).

**Écarts trouvés et corrigés, page par page** :
- **Programmes** : refonte complète de la carte programme (icône à cheval
  sur la photo/le texte, variante large pour Parents TBW) + panneau "impact"
  en 8e case ; 7 photos manquantes générées via Canva (voir méthode
  ci-dessous) et versées dans `storage/app/public/programs/`.
- **Bibliographie** : colonne photo secondaire + logo manquante dans le
  corps de texte (mockup en 2 colonnes, rendu précédent en 1 seule).
- **Architecture** : volet 6 (Fondation TUBAWWIRI) avait une photo
  générique — remplacée par la vraie photo générée
  (`public/images/architecture/fondation-tubawwiri.jpg`). Volet 12
  (Observatoire) : remplace l'icône générique par un vrai graphique
  "carte d'Afrique" en SVG (silhouette + 4 badges thématiques en cercle).
  **Volets 7 à 11 (TBW Academy, TBW Consulting, Communication, Campagnes,
  Ressources) restent bloqués** : quota Canva atteint dès la 8e génération de
  la session, jamais revenu depuis malgré plusieurs nouveaux essais — ces
  volets affichent un panneau neutre "Photo à venir" (FR/EN) plutôt qu'une
  photo de communauté générique qui ne correspondrait pas au mockup
  (consigne explicite de la Fondatrice : dire clairement plutôt
  qu'approximer). Support ajouté dans la vue pour une photo à gauche OU à
  droite du texte, nécessaire pour ces volets dont le mockup place la photo
  côté gauche.
- **Rubriques** : CTA "En savoir plus" renommé "Voir plus" pour coller au
  mockup — le reste (grille 5 colonnes, photos recadrées, badges) était déjà
  conforme.
- **Domaines d'action (index)** : ajout du défilement horizontal +
  flèches + pagination par points + lien "En savoir plus" + section
  "La méthode CAVAMIS" (5 piliers) en pied de page, absents du rendu
  précédent (simple grille statique). Fiche détail et bloc accueil déjà
  conformes.
- **Observatoire** : ajout du panneau décoratif "carte d'Afrique" qui comble
  la 3e colonne (2 analyses en base = 2 cartes + 1 panneau, comme le mockup)
  et du bouton "Voir plus d'analyses".
- **Ressources** : bouton "Voir plus de ressources" manquant en pied de
  section, ajouté.
- **TBW Academy** : le mockup montre 5 modules calqués sur les 5 premiers
  domaines d'action, avec les mêmes photos. Il manquait le module
  "Résilience humaine" (créé) et les 4 modules existants n'avaient pas de
  photo de couverture (réutilisation des photos des domaines
  correspondants) ; ordre d'affichage forcé par slug dans
  `AcademyController::index()` pour matcher l'ordre du mockup (l'ordre
  d'insertion en base ne suffisait pas). Page détail déjà conforme.
- **TBW Consulting** : déjà conforme, aucun changement.
- **Actualités** : bouton "Voir plus d'actualités" manquant, ajouté.
- **Contact** : le mockup n'a pas de bandeau de titre séparé — la page
  démarre directement sur les 2 cartes de formulaire, avec une décoration
  végétale discrète dans leur coin. Bandeau "Contact" en trop retiré.
- **Faire un don** : les pastilles "Moyen de paiement" et "Type de don"
  étaient en grille 2×2, le mockup les montre sur une seule ligne de 4 —
  corrigé (`sm:grid-cols-4`).
- **Nous rejoindre** : grille des 6 rôles en 2×3, mockup en 3×2 — corrigé.
- **Nos impacts** : panneau décoratif ajouté pour combler la grille
  témoignages (2 témoignages en base = 2 cartes + 1 panneau, comme le
  mockup).
- **Médias** : refonte complète — le rendu précédent utilisait le pattern
  "1 cadre = défilement horizontal plein écran" hérité de 3.11, mais le
  mockup montre en réalité les 4 catégories côte à côte dans une grille à 4
  colonnes avec aperçu compact (photo/vidéo principale + vignettes, liste
  des 3 premiers documents), compteur en pied de carte, et une barre d'appel
  à l'action "Télécharger tout le kit presse" en bas de section.
- **Pied de page** : déjà conforme (fait en 3.12), vérifié sans changement.
- **Accueil, méthode CAVAMIS** : nouveau mockup fourni le 15-16/08
  (`exemplemethodecavamissurlapageaccueil.png`), différent de ce qui avait
  été fait en 3.12 — grille fixe 4+3 (pas de réorganisation libre), description
  sous chaque titre (ajoutée en FR/EN, absente avant), filigrane
  soleil/arbre avec texte arqué "TESIMAMA • TOLAMUKE • TELUMIÈRE" (approximation
  SVG, pas de fichier source séparé pour le texte arqué), filigrane racines,
  bouton pilule "NOTRE APPROCHE →".
- **Accueil, Domaines d'action** : ajout d'un défilement automatique
  (auto-scroll toutes les 3.5s, boucle, pause au survol/touch, respecte
  `prefers-reduced-motion`) — la Fondatrice demandait de l'animation plutôt
  qu'un simple défilement manuel à la flèche.
- **Accueil, Doctrine des 3T** : **cause du "souci de cadrage" identifiée** —
  les images lion/léopard/rapace (déjà recadrées depuis les symboles
  TESIMAMA/TOLAMUKE/TELUMIÈRE en 3.12) ont un fond **noir plein**, ce qui
  laisse de gros vides noirs disgracieux une fois `object-cover` dans les
  cartes 480px. Corrigé en détourant le fond noir (clé d'alpha sur la
  luminosité, script Python/PIL) et en le recomposant sur le vert forêt de
  la charte (`#123D2E`) au lieu du noir — se fond naturellement dans le
  design plutôt que de trancher. Animation ajoutée : les 3 cartes utilisent
  la classe `reveal` individuellement avec un délai croissant (0/220/440ms)
  pour apparaître l'une après l'autre. Au passage, l'accent violet clair
  `#9b7fd1` resté sur la carte TELUMIÈRE (repéré en marge de 3.13) a été
  remplacé par l'or de la charte comme les deux autres cartes.
- **Navigation clavier** : ajout d'un gestionnaire clavier global
  (`resources/views/layouts/app.blade.php`) qui déclenche les liens
  précédent/suivant (`id="page-nav-prev"`/`"page-nav-next"`, ajoutés sur
  Qui sommes-nous, Notre approche, Bibliographie, Architecture, Rubriques,
  Domaines d'action et Programmes détail via le composant partagé
  `field-page`) sur ArrowLeft/ArrowRight, sauf focus dans un champ de
  formulaire ou lien désactivé (première/dernière page).
- **Couleur violette en fond** : re-vérifiée exhaustivement sur tout le
  site public (`grep` sur `3B2560`, teintes violettes/purple) — **aucune
  n'existe en aplat de fond**, seulement la barre dégradée de 3px en haut de
  chaque page (accent ponctuel rare, explicitement toléré par la Fondatrice)
  et une variable CSS `--tbw-violet` jamais utilisée. Le seul vrai écart
  trouvé (accent `#9b7fd1` sur la carte TELUMIÈRE) a été corrigé au passage
  ci-dessus.
- **Animation sur les pages sans photo** : Contact, Faire un don et Nous
  rejoindre n'ont pas de bandeau photo (par design, conforme à leurs
  mockups) — ajout d'un motif décoratif très discret (cercles concentriques
  / racines, ~5% d'opacité) qui dérive lentement en boucle via CSS
  (`<x-ambient-bg>`, respecte `prefers-reduced-motion`).

**Méthode de génération de photos manquantes (Canva)** : `generate-design`
(design_type `desktop_wallpaper`, query = description photographique pure,
"aucun texte/logo/superposition") → `create-design-from-candidate` →
`export-design` (format png) → `curl` direct sur l'URL S3 présignée
retournée (pas d'authentification requise, contrairement à une note
précédente maintenant corrigée). Les fichiers exportés sont du vrai PNG même
si nommés `.jpg` — repasser par `convert fichier.jpg -quality 88 fichier.jpg`
(ImageMagick) pour obtenir un vrai JPEG. **Quota de génération limité** —
atteint après 8 générations dans cette session (15-16/08), pas revenu au
16/08 malgré plusieurs nouveaux essais espacés dans le temps ; à retester en
priorité en début de prochaine session avant de conclure qu'il faut
approximer ou attendre encore.

**Piège d'environnement rencontré, à connaître pour toute session future** :
`php artisan serve` sert les assets depuis `public/build/` (le manifest Vite
compilé) **seulement si `public/hot` n'existe pas**. Si un `npm run dev`
d'une session précédente a laissé ce fichier, chaque page essaie de charger
son CSS/JS depuis `http://127.0.0.1:5173` (serveur Vite mort) et **tout le
site tourne sans le moindre style Tailwind** — layout complètement cassé,
qui peut se lire à tort comme un bug de responsive/overflow réel. Symptôme
observé : boutons/liens qui se chevauchent, grilles qui ne se forment pas,
header qui déborde. Réflexe en début de session : `rm -f public/hot` si
présent, et **toujours `npm run build` après toute modification de classes
Tailwind avant de faire une capture d'écran de vérification** (`php artisan
serve` ne recompile jamais tout seul).

### 3.14 Quatrième vague : remarques dictées du 16-17/08/2026

Nouveau lot de remarques dictées (non ponctuées) après la comparaison
stricte de 3.13. Traité sur la branche `refonte-visuelle-remarques-v3`
(base `develop`, qui contient déjà 3.13 via la PR #8).

**Corrigé** :
- **Médias, bouton "Télécharger tout le kit presse"** : coupait sur deux
  lignes (aucun bouton du site n'avait `whitespace-nowrap` — celui-ci a le
  plus long libellé). Ajout de `whitespace-nowrap` + padding/texte
  responsive.
- **CAVAMIS (accueil) et méthode CAVAMIS (page Domaines d'action)** : "pas
  le logo, l'arbre n'est pas bien fait" — les deux SVG dessinés à la main
  (déjà signalés comme approximatifs en 3.13) ont été remplacés par le vrai
  logo de marque `public/images/logo-mark.png` (fond transparent confirmé
  via PIL malgré un rendu blanc à l'aperçu) en filigrane, avec un filtre
  CSS (`invert(1) brightness(1.7) contrast(0.9)`) pour qu'il se lise en
  clair sur le fond vert forêt, opacité ~0.07, animation douce
  `ambient-bg-motif` déjà existante (répond aussi à la remarque sur
  l'animation des pages sans photo, voir plus bas).
- **Carrousel Domaines d'action (accueil)** : il manquait la flèche
  gauche/précédent (bug de parité — seule la page Domaines d'action l'avait)
  et la pagination par points ; les deux ajoutés, conformes au mockup
  `exempleinterfacenosdomainesactionsurpagedaccueil.png`.
- **Doctrine des 3T, l'aigle (et le lion/léopard) coupés** : cause
  identifiée — `object-cover` centré sur des photos très hautes (têtes des
  3 animaux dans le tiers supérieur de l'image) rognait le haut dans des
  cartes `h-[480px]` plus larges que hautes. Corrigé avec `object-top` sur
  les 3 images ; vérifié par simulation de recadrage (script Python/PIL) que
  les 3 visages restent entiers.
- **Glisser à la souris** ("scroller ... en glissant juste sur la souris") :
  ajouté en plus du défilement tactile natif déjà présent, sur (a) tous les
  carrousels `.content-scroll-viewport` (domaines, academy…) et (b) les
  pages "1 cadre = 1 page" (glisser > 80px déclenche précédent/suivant),
  via une classe commune `page-swipe-card` posée sur le même bloc carte
  dupliqué dans `field-page.blade.php`, `institutional.blade.php`,
  `architecture/index.blade.php`, `rubriques/show.blade.php` (et
  `founder/index.blade.php`, voir Bibliographie ci-dessous). Script
  générique unique dans `layouts/app.blade.php`, à côté du gestionnaire
  clavier existant.
- **Défilement automatique façon PowerPoint** sur les pages "1 cadre = 1
  page" (Notre approche, Qui sommes-nous, Bibliographie citées
  explicitement — étendu aux 7 pages de la famille pour la cohérence,
  le mécanisme `#page-nav-next` étant déjà uniforme partout) : boucle
  toutes les ~7,5s, revient à la page 1 après la dernière (pas d'arrêt
  sec), pause au survol/touch, respecte `prefers-reduced-motion`. Attribut
  `data-first-url` posé sur `#page-nav-prev` dans chaque page pour boucler
  proprement sans sélecteur fragile.
- **Domaines d'action, photos floues sur les pages détail** : cause
  confirmée — les photos de `storage/app/public/domains/*.jpg` sont
  réellement basse résolution (701×561 ou moins, 470×430 pour
  `leadership-feminin.jpg`, et le fichier source dans `imagestubawwiri/`
  n'est pas plus grand), étirées en plein cadre sur les pages détail. Les
  photos Programmes (1920×1080) n'ont pas ce problème. Quota Canva retesté
  en priorité (voir ci-dessous) : toujours bloqué, donc fallback CSS
  appliqué uniquement aux Domaines d'action — fond flouté (`blur-xl`) +
  vignette de taille raisonnable non agrandie, via un nouveau prop
  `photo-soft` sur `field-page.blade.php` (désactivé par défaut, donc les
  pages Programmes qui partagent le même composant ne sont pas affectées).
- **Retest quota Canva (Architecture volets 7-11 + Domaines d'action HD)** :
  retesté en tout début de session comme demandé — **toujours refusé**
  (3e essai, après le 15/08 et le 16/08). Rien de plus à faire tant que le
  quota n'est pas revenu ; ne pas approximer avec des photos qui ne
  correspondent pas au sujet (déjà la consigne de la Fondatrice).

**Construit pour décision (pas encore tranché)** :
- **Bibliographie de la Fondatrice** : la Fondatrice n'aime pas le rendu
  paginé actuel ("tu as mis la photo tellement grande que pour lire il faut
  scroller vers le bas pourtant le texte n'est pas long") mais a demandé de
  construire les deux options plutôt que trancher à l'aveugle :
  - **Option A** (nouvelle, temporaire) — `/bibliographie-fondatrice-apercu`
    (route `founder.apercu`, vue `pages/founder/apercu-unique.blade.php`) :
    page unique, copie conforme du mockup `exemplepagebibliographie.png`
    (hero modéré, bandeau de 3 qualifications, corps en 2 colonnes — texte
    courant + une seule photo/logo, citation en bas), sans flèches ni
    pagination.
  - **Option B** (existante) — `/bibliographie-fondatrice` reste paginée (4
    pages, une par paragraphe) mais corrigée : suppression de la 2e
    occurrence de la photo dans le corps (le hero suffit), hauteurs
    minimales forcées réduites (`min-h-[52vh]`→`min-h-[32vh]` sur le hero,
    `min-h-[60vh]` retiré du corps) pour que le scroll ne soit plus imposé
    à un paragraphe de 40-65 mots ; profite du glisser-souris et de
    l'autoplay ajoutés dans cette même session.
  - **Donner les deux liens (FR/EN) à la Fondatrice pour comparaison
    visuelle. Une fois le choix fait : supprimer l'option non retenue**
    (voir tête de fichier) — ne pas laisser les deux cohabiter
    indéfiniment, l'aperçu est explicitement temporaire.

**Méthode de vérification utilisée cette session** (l'extension navigateur
Claude in Chrome n'était pas connectée, donc pas de test visuel live) :
`curl` sur chaque route touchée (FR + EN) pour confirmer un code 200 et
l'absence de trace d'erreur Blade/PHP dans la réponse, `grep` sur le HTML
retourné pour confirmer la présence des classes/attributs attendus
(`whitespace-nowrap`, `page-swipe-card`, `logo-mark.png`, `blur-xl` sur les
domaines mais pas sur les programmes…), et simulation de recadrage
`object-position` via un script Python/PIL pour vérifier visuellement le
correctif de la Doctrine des 3T avant de l'appliquer. **À refaire avec un
vrai test navigateur (clavier + glisser souris + autoplay en conditions
réelles) dès que l'extension est disponible, avant de considérer 3.14
définitivement clos.**

**Suite immédiate (17/08/2026, même jour)** : la Fondatrice a retesté et
remonté 3 bugs réels, confirmés cette fois avec de vraies captures d'écran
Chrome headless (`google-chrome --headless --screenshot`, l'extension
navigateur restant indisponible) plutôt que par simple lecture de code —
**leçon retenue : toujours capturer une vraie image avant de déclarer un
correctif "vérifié", un `curl` qui renvoie 200 ne prouve rien sur le rendu
visuel.** Piège méthodologique rencontré au passage : une fenêtre headless
avec une hauteur artificiellement énorme (ex. 3200px) fait exploser les
sections en `min-h-[..vh]` et peut faire croire à un bug qui n'existe pas
à une hauteur d'écran réaliste (900-1000px) — toujours comparer aux deux
tailles avant de conclure.

- **Écart vide entre la fin d'une page courte et le pied de page**
  ("le pied de page a un problème, je vois méthode CAVAMIS là-bas pourtant
  ça ne devrait pas") — confirmé par capture : le pattern sticky-footer
  (`body` en `min-h-screen flex flex-col`, `<main class="flex-1">`) laisse
  un vide couleur crème (fond du `body`) entre la dernière section d'une
  page plus courte que la fenêtre et le pied de page, visible notamment sur
  Domaines d'action (juste après la méthode CAVAMIS). Corrigé dans
  `layouts/app.blade.php` : `<main>` a maintenant
  `class="flex-1 flex flex-col [&>*:last-child]:flex-1"` — c'est la
  dernière section de la page elle-même qui s'étire pour combler l'espace
  restant, avec son propre fond, au lieu du crème du body.
- **Glisser à la souris qui ne fonctionnait pas sur Qui sommes-nous et
  Rubriques** ("je ne peux pas scroller en glissant avec ma souris, juste
  la flèche") — cause : les `<img>` de fond occupent presque toute la carte
  `.page-swipe-card`, et le comportement par défaut du navigateur est de
  démarrer un glisser-déposer natif de l'image dès qu'on clique dessus et
  bouge la souris, ce qui empêche l'événement `mouseup` de se déclencher
  normalement et casse la détection de glissement en JS. Corrigé avec
  `draggable="false"` posé en JS sur toutes les images des zones
  `.page-swipe-card`/`.content-scroll-viewport` au chargement, plus
  `-webkit-user-drag: none` en CSS.
- **Page Programmes sans aucune image de fond ni animation** ("les images
  en arrière-plan non plus, les images animées en arrière-plan non plus")
  — vérifié : contrairement à toutes les autres pages listing (Domaines
  d'action, TBW Academy, Observatoire, Centre de ressources, Actualités,
  Nos impacts, Médias, TBW Consulting), la page Programmes n'avait tout
  simplement **jamais eu** de bandeau `<x-page-hero>` (photo + effet Ken
  Burns), malgré la demande d'origine (3.5) et malgré le lot "Bryan" noté
  comme terminé en section 8 — écart réel, pas juste un ressenti. Ajouté
  avec la clé de traduction `pages.programs_intro` (déjà présente, jamais
  utilisée). **À vérifier si d'autres pages du lot Bryan (Observatoire,
  Domaines d'action, Nos impacts) ont des écarts similaires non détectés
  faute de test visuel réel — seule Programmes a été vérifiée par capture
  d'écran cette fois.**
- **Photos manquantes bloquées par le quota Canva (Architecture volets
  7-11, et accessoirement les photos Domaines d'action en plus haute
  résolution)** : la Fondatrice a proposé de les faire générer par ChatGPT
  ou de chercher de vraies photos elle-même. Descriptions transmises en
  conversation (pas de fichier séparé) — **à reconsigner ici sous forme de
  liste si elle fournit les fichiers dans une session future**, pour que le
  prochain remplacement (`public/images/architecture/*.jpg`) soit direct.

## 4. CHANTIER PRIORITAIRE N°2 — Admin Filament : le rendre beau et dynamique

**À traiter une fois le chantier 3 terminé.** L'admin Filament est actuellement
fonctionnel mais visuellement "par défaut" (thème Filament standard, juste la
couleur primaire changée en `#123D2E`). Objectif : un rendu **"style Canva"** —
soigné, chaleureux, avec du caractère — cohérent avec l'identité du site public,
mais rester dans les codes d'un vrai back-office (lisible, dense, pro).

**Note (15/08)** : les catégories de la rubrique Actualités existent déjà côté
code mais sont vides (aucun article publié) — ce n'est pas un bug, juste un
manque de contenu. La Fondatrice a choisi de **traiter la publication de
contenu (articles, activités) après avoir terminé ce chantier admin**, une
fois l'interface de publication elle-même bien finalisée — pas la peine d'y
revenir avant.

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
- Générer si besoin d'autres visuels via Canva (même méthode que pour le
  login : `generate-design` avec `design_type: desktop_wallpaper` pour des
  photos/fonds, palette `#123D2E`/`#C99A3E`/`#6B2A28`/`#3B2560`, style
  organique/épuré). **Correction (15/08) : le téléchargement direct de
  l'export est possible depuis l'environnement**, vérifié empiriquement —
  `export-design` renvoie une URL S3 présignée (`export-download.canva.com`,
  pas d'authentification interactive) que `curl` télécharge directement sur
  le disque du projet, sans intervention manuelle de l'utilisatrice. La note
  précédente affirmant le contraire était fausse. Attention : les fichiers
  exportés arrivent en PNG même avec une extension `.jpg` demandée —
  repasser par `convert fichier.jpg -quality 88 fichier.jpg` (ImageMagick)
  pour obtenir un vrai JPEG si le nom de fichier promet un `.jpg`.

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

## 7. Ordre de priorité (mis à jour 17/08/2026)

1. **Section 3** — Refonte visuelle du site public (remarques Fondatrice) —
   priorité absolue. **3.1 à 3.14 sont terminées** sur la branche
   `refonte-visuelle-remarques-v3` (base `develop`, pas encore mergée).
   Reste ouvert : 5 photos manquantes sur la page Architecture (volets
   7-11) + photos Domaines d'action en plus haute résolution, bloquées par
   le quota Canva — voir tête de fichier et 3.14 ; et la décision finale sur
   la Bibliographie (Option A page unique vs Option B paginée), les deux
   étant construites et prêtes à comparer — voir tête de fichier et 3.14.
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

## 10. Déploiement de test (Render + Aiven) — état et pièges connus

Lien de test partagé avec la Fondatrice pour retours : **https://tubawwiri.onrender.com**
(pas l'hébergement définitif — ça reste `tubawwiri.org` sur Hostinger plus
tard, voir section 7). Procédure de mise en place complète :
`INSTRUCTIONS_DEPLOIEMENT_TEST.md` à la racine du projet (désormais suivi par
git, voir section 10.3).

### 10.1 Check-list avant de diagnostiquer "le site est en panne"

Le lien peut sembler cassé en début de session sans qu'il y ait de vrai bug —
**deux causes bénignes à éliminer avant toute investigation** :

1. **Render (plan gratuit) met le service en veille après 15 min sans
   visite.** Le premier appel après une pause peut renvoyer un `503` avec
   l'en-tête `x-render-routing: hibernate-wake-error`, ou simplement ne
   répondre à aucune requête pendant 60-90s (parfois plus) le temps du
   réveil. **Toujours réessayer avec un délai généreux (`curl --max-time
   150` ou plus) avant de conclure à une panne.**
2. **Aiven (base MySQL gratuite) se met hors tension automatiquement après
   une période d'inactivité, indépendamment de Render.** Symptôme : le site
   ne répond jamais du tout (le conteneur Render boucle sans jamais ouvrir
   son port, car migrate ne peut pas joindre la base — voir 10.2). Aller sur
   https://console.aiven.io → service `mysql-877b421` → si le statut affiche
   **"Powered off"**, cliquer sur le bouton d'allumage. Ça prend 1-2 minutes.
   Il n'y a pas de solution permanente sans passer au plan payant Aiven
   (5$/mois, visible sur leur propre dashboard) — **à chaque session de
   test, s'attendre à devoir rallumer Aiven à la main.**

Un redéploiement (`Manual Deploy` sur Render) relance tout le build
(`composer install`, `npm install && npm run build`) — sur le plan gratuit
ça peut prendre plusieurs minutes, pas juste un redémarrage instantané.

### 10.2 Bugs réels trouvés et corrigés (session du 26/08/2026)

Trois bugs distincts diagnostiqués par curl direct sur le lien de test
(l'extension navigateur n'était pas disponible pendant cette session) :

1. **CSS bloqué comme contenu mixte http/https** — déjà corrigé en amont
   (commit `79274ee`, avant cette session) : sans `trustProxies`, Laravel
   générait les URLs d'assets en `http://` derrière le proxy Render/
   Cloudflare qui termine le HTTPS ; le navigateur bloquait le CSS/JS. Fix
   dans `bootstrap/app.php` (`$middleware->trustProxies(at: '*')`). Toujours
   en place et vérifié fonctionnel cette session (liens `<link>`/`<script>`
   bien en `https://` sur `/fr` et `/en`).
2. **Le conteneur ne démarrait jamais si la base était injoignable au
   boot** — la chaîne `CMD` du `Dockerfile` était entièrement bloquante :
   `config:cache && migrate --force && seed && seed && serve`. Si `migrate`
   échoue (base Aiven éteinte, voir 10.1), tout s'arrête net et
   `php artisan serve` n'est **jamais** atteint — donc le port n'est jamais
   ouvert, Render voit un échec de réveil permanent
   (`hibernate-wake-error` en boucle) et **le site entier devient
   inaccessible** (pas juste les pages liées à la base — tout, y compris le
   CSS, d'où la confusion initiale "le style ne s'applique pas"). Corrigé en
   rendant `migrate`/les deux `db:seed` non-bloquants (`|| true`) — commit
   `b09f057` sur `develop`. Le serveur démarre maintenant même si la base a
   un souci temporaire (les pages qui en dépendent afficheront une erreur,
   mais le reste du site reste accessible).
3. **`public/storage` (symlink vers `storage/app/public`) n'était jamais
   créé dans le conteneur** — `php artisan storage:link` n'était appelé nulle
   part (ni au build, ni au runtime). Résultat : toutes les URLs
   `asset('storage/...')` (photos de couverture des Domaines d'action et des
   Programmes, via `domain-card.blade.php`/`program-card.blade.php` et les
   pages détail) renvoyaient `404` — cadres visuellement vides sur le site
   déployé alors que les fichiers existaient bien dans l'image Docker (14
   fichiers trackés dans `storage/app/public/domains/` et
   `storage/app/public/programs/`, copiés au build). Corrigé en ajoutant
   `php artisan storage:link` (non-bloquant lui aussi) dans la chaîne `CMD` —
   commit `10f249d` sur `develop`. Vérifié : les 14 images renvoient `200`
   après ce correctif.

**Limitation connue, pas encore corrigée** : le `Dockerfile` lance
`php artisan serve` (serveur de développement intégré à PHP), qui traite les
requêtes **une par une, pas en parallèle**. Un `502 Bad Gateway` ponctuel a
été observé une fois pendant cette session (disparu au réessai immédiat) —
cause probable : plusieurs requêtes simultanées (HTML + CSS + JS + images
d'une même page) saturent le serveur mono-thread. Le `Dockerfile` assume
explicitement ce compromis dans son commentaire d'en-tête ("simple, pas
optimisé production"). **Si des `502` reviennent de façon régulière** (pas
juste une fois), il faudra remplacer `php artisan serve` par un vrai serveur
concurrent (nginx + PHP-FPM, ou équivalent) dans le `Dockerfile` — pas fait
faute de nécessité confirmée à ce stade.

### 10.3 État du `Dockerfile` actuel (`develop`, commit `10f249d`)

```
CMD php artisan config:cache && \
    (php artisan storage:link || true) && \
    (php artisan migrate --force || true) && \
    (php artisan db:seed --class=TubawwiriSeeder --force || true) && \
    (php artisan db:seed --class=TeamAccountsSeeder --force || true) && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
```

`INSTRUCTIONS_DEPLOIEMENT_TEST.md` (procédure complète de mise en place
Render + Aiven depuis zéro) est maintenant suivi par git — ne plus le
laisser en fichier non tracké, il faisait partie des `?? ` de `git status`
avant cette session, risque de perte s'il n'était que local.
