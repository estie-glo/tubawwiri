<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Adresses de réception des notifications par service
    |--------------------------------------------------------------------------
    | Définies dans .env, avec une adresse de secours si non configurée.
    */

    'mail_to' => [
        'contact' => env('MAIL_TO_CONTACT', 'estellewandji67@gmail.com'),
        'partnership' => env('MAIL_TO_PARTNERSHIP', 'estellewandji67@gmail.com'),
        'academy' => env('MAIL_TO_ACADEMY', 'estellewandji67@gmail.com'),
        'consulting' => env('MAIL_TO_CONSULTING', 'estellewandji67@gmail.com'),
        'donations' => env('MAIL_TO_DONATIONS', 'estellewandji67@gmail.com'),
        'join' => env('MAIL_TO_JOIN', 'estellewandji67@gmail.com'),
        'newsletter' => env('MAIL_TO_NEWSLETTER', 'estellewandji67@gmail.com'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Coordonnées publiques
    |--------------------------------------------------------------------------
    */

    'contact' => [
        'email' => env('TBW_CONTACT_EMAIL', 'contact@tubawwiri.org'),
        'phone' => env('TBW_PHONE', ''),
        'whatsapp' => env('TBW_WHATSAPP', env('WHATSAPP_NUMBER', '')),
        'website' => env('TBW_WEBSITE', 'www.tubawwiri.org'),
        'maps_query' => env('TBW_MAPS_QUERY', 'Cameroun'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Réseaux sociaux
    |--------------------------------------------------------------------------
    */

    'social' => [
        'facebook' => env('TBW_FACEBOOK', 'https://www.facebook.com/share/1BDyqZc56h/'),
        'instagram' => env('TBW_INSTAGRAM', 'https://www.instagram.com/fondation_tubawwiri'),
        'youtube' => env('TBW_YOUTUBE', 'https://www.youtube.com/@fondationtubawwiri'),
        'tiktok' => env('TBW_TIKTOK', 'https://tiktok.com/@tubawwiri'),
        'linkedin' => env('TBW_LINKEDIN', ''),
        'whatsapp_channel' => env('TBW_WHATSAPP_CHANNEL', 'https://whatsapp.com/channel/0029VbBM0v78vd1S72nzO43C'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Instructions de don (mode manuel livrable — API MoMo/Orange plus tard)
    |--------------------------------------------------------------------------
    */

    'donations' => [
        'mtn_momo' => env('TBW_DONATION_MTN', ''),
        'orange_money' => env('TBW_DONATION_ORANGE', ''),
        'bank_iban' => env('TBW_DONATION_IBAN', ''),
        'bank_name' => env('TBW_DONATION_BANK', ''),
        'account_name' => env('TBW_DONATION_ACCOUNT_NAME', 'Fondation TUBAWWIRI (TBW)'),
    ],

];
