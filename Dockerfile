# Dockerfile de test/démo pour Render — simple, pas optimisé production
FROM php:8.4-cli

# Extensions PHP nécessaires pour Laravel + Filament + MySQL
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd intl \
    && apt-get clean

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer Node (pour compiler le CSS/JS avec Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /app
COPY . .

# Installer les dépendances PHP et JS
RUN composer install --no-dev --optimize-autoloader
RUN npm install

# Précompiler les vues Blade AVANT de builder le CSS : Tailwind scanne aussi
# storage/framework/views/*.php (voir resources/css/app.css, @source) pour
# détecter les classes utilisées dans les vues des packages vendor (Filament
# notamment) qui ne sont pas scannées autrement. Sans cette étape, ce dossier
# est vide sur un checkout neuf et le CSS généré manque des centaines de
# classes utilisées par l'admin Filament (couleurs, Choices.js, animations).
# Fonctionne sans .env/variables d'env (vérifié) — ne touche pas la base.
RUN php artisan view:cache

RUN npm run build

# Créer les dossiers de stockage si besoin et donner les permissions
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Render fournit le port via la variable $PORT — on migre, on seed (idempotent,
# updateOrCreate partout, donc sans danger à chaque redémarrage) puis on lance le serveur.
# migrate/seed sont non-bloquants (|| true) : si Aiven (base gratuite qui peut
# s'endormir/redémarrer indépendamment de Render) est temporairement injoignable,
# le site démarre quand même plutôt que de rester bloqué sans jamais ouvrir le port.
CMD php artisan config:cache && \
    (php artisan storage:link || true) && \
    (php artisan migrate --force || true) && \
    (php artisan db:seed --class=TubawwiriSeeder --force || true) && \
    (php artisan db:seed --class=TeamAccountsSeeder --force || true) && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
