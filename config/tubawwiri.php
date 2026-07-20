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
    ],

];
