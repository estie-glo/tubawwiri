# Déployer TUBAWWIRI en test sur Render (gratuit) + Aiven MySQL (gratuit)

But : donner un lien public temporaire pour que des gens testent le site et
donnent des retours — pas encore l'hébergement définitif (ça reste tubawwiri.org
sur Hostinger plus tard).

## Étape 1 — Créer la base de données MySQL gratuite (Aiven)

1. Va sur https://aiven.io et crée un compte gratuit (pas de carte bancaire).
2. Crée un nouveau service → choisis **MySQL** → sélectionne le plan **Free**.
3. Une fois créé (ça prend 1-2 minutes), va dans l'onglet **"Overview"** du
   service, tu verras les informations de connexion :
   - Host
   - Port
   - Database name (souvent `defaultdb`)
   - User
   - Password
   - Tu peux aussi copier le "Service URI" complet.
4. Garde cette page ouverte, tu en auras besoin à l'étape 3.

## Étape 2 — Mettre le Dockerfile dans ton projet

Le fichier `Dockerfile` fourni doit être placé **à la racine** de ton projet :
```bash
cp ~/Téléchargements/Dockerfile ~/tubawwiri/Dockerfile
cd ~/tubawwiri
git add Dockerfile
git commit -m "chore: ajouter Dockerfile pour déploiement de test Render"
git push origin develop
```

## Étape 3 — Créer le service web sur Render

1. Va sur https://render.com et crée un compte gratuit (pas de carte requise),
   connecte-le à ton compte GitHub.
2. Clique sur **"New +"** → **"Web Service"**.
3. Choisis ton dépôt `estie-glo/tubawwiri`, branche **`develop`**.
4. Render détecte le `Dockerfile` automatiquement — laisse le type sur **Docker**.
5. Choisis le plan **Free**.
6. Dans **"Environment Variables"**, ajoute toutes ces variables (une par une,
   bouton "Add Environment Variable") :

| Clé | Valeur |
|---|---|
| `APP_NAME` | `Fondation TUBAWWIRI (TBW)` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | *(laisse vide pour l'instant, voir étape 4)* |
| `APP_URL` | *(laisse vide, Render te donnera l'URL après création)* |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | *(le "Host" copié depuis Aiven)* |
| `DB_PORT` | *(le "Port" copié depuis Aiven)* |
| `DB_DATABASE` | *(le "Database name" copié depuis Aiven)* |
| `DB_USERNAME` | *(le "User" copié depuis Aiven)* |
| `DB_PASSWORD` | *(le "Password" copié depuis Aiven)* |
| `MAIL_MAILER` | `log` *(pour ce test — pas besoin d'envoyer de vrais emails)* |
| `TBW_WHATSAPP` | `237676869191` |
| `TBW_FACEBOOK` | `https://www.facebook.com/share/1BDyqZc56h/` |
| `TBW_INSTAGRAM` | `https://www.instagram.com/fondation_tubawwiri` |
| `TBW_DONATION_MTN` | `237676869191` |
| `TBW_DONATION_ORANGE` | `237656116762` |

7. Clique sur **"Create Web Service"**. Le premier déploiement prend 5-10
   minutes (il installe tout, compile les assets).

## Étape 4 — Générer la clé d'application

Une fois le premier déploiement terminé (même s'il affiche une erreur à cause
de la clé manquante, c'est normal) :

1. Sur ton PC, dans ton projet local :
   ```bash
   cd ~/tubawwiri
   php artisan key:generate --show
   ```
2. Copie la valeur affichée (commence par `base64:...`).
3. Retourne sur Render → ton service → **"Environment"** → modifie `APP_KEY`
   avec cette valeur.
4. Mets aussi à jour `APP_URL` avec l'adresse que Render t'a donnée (visible
   en haut de la page du service, du genre `https://tubawwiri-xxxx.onrender.com`).
5. Sauvegarde → Render redéploie automatiquement.

## Étape 5 — Vérifier et partager

Une fois redéployé, ouvre l'URL Render (`https://tubawwiri-xxxx.onrender.com`)
— tu dois voir le site. Ajoute `/fr` si ça ne redirige pas automatiquement.

Va sur `/admin/login` et connecte-toi normalement. Si la base est vide (aucun
contenu), lance le seeder à distance : Render propose un **"Shell"** dans le
tableau de bord du service, ouvre-le et tape :
```bash
php artisan db:seed --class=TubawwiriSeeder
php artisan db:seed --class=TeamAccountsSeeder
```

C'est ce lien `https://tubawwiri-xxxx.onrender.com` que tu peux maintenant
partager pour avoir des retours.

## À savoir

- Le site se met en veille après 15 minutes sans visite — le premier visiteur
  après une pause attend 30-60 secondes le temps que ça redémarre. Normal sur
  le plan gratuit, pas un bug.
- Les emails ne partent pas vraiment (`MAIL_MAILER=log`) — pour un vrai test
  d'envoi, il faudrait reconfigurer avec de vraies infos SMTP (Gmail comme on
  a fait en local, par exemple).
- Ce n'est PAS l'hébergement définitif — juste pour les retours. Le vrai site
  ira sur Hostinger avec le domaine tubawwiri.org (voir la proposition
  tarifaire déjà remise).
