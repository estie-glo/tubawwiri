<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Fondation Tubawwiri -- Prise en main


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation du Projet

Installation des dépendances
```bash
composer install
npm install
```
Création du fichier d'environnement 
```bash
cp .env.example .env
```
Dans `.env`
```bash
APP_NAME=Tubawwiri

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tubawwiri
DB_USERNAME=root
DB_PASSWORD=
```
Générer la clé 
```bash
php artisan key:generate
```

Installation de la base de données : 
```bash 
php artisan migrate --seed
php artisan storage:link
```
## Lancement du  projet 
Dans un terminal 
```bash
php artisan serve
```
Dans un autre terminal
```bash
npm run dev
```
## Espace Administrateur

Le login administrateur (filamant) est disponible sur la route `/admin/login`. Les identifiants de connexion 
```bash
email : admin@tubawwiri.org
mot de passe : changeme123
```
Ces informations peuvent être changés dans le fichier `database/seeders/DatabaseSeeer.php`
Pour activer les modifications
```bash
php artisan migrate:fresh --seed
```

# TESTS 
```bash
cp .env.example .env.testing
php artisan key:generate
php artisan migate --env=testing
php artisan db:seed --class=TestDataseeder

#lancer les test
php artisan test  #tous les tests
php artisan test --testsuite=Feature #uniquement les tests feature
php artisan test --coverage #avec rapport de couverture




