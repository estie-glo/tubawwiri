<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Adresses de réception des notifications par service
    |--------------------------------------------------------------------------
    | Définies dans .env, avec une adresse de secours si non configurée.
    */

    'mail_to' => [
        'contact' => env('MAIL_TO_CONTACT', 'contact@tubawwiri.org'),
        'partnership' => env('MAIL_TO_PARTNERSHIP', 'partenariat@tubawwiri.org'),
        'academy' => env('MAIL_TO_ACADEMY', 'academy@tubawwiri.org'),
        'consulting' => env('MAIL_TO_CONSULTING', 'consulting@tubawwiri.org'),
        'donations' => env('MAIL_TO_DONATIONS', 'contact@tubawwiri.org'),
        'join' => env('MAIL_TO_JOIN', 'contact@tubawwiri.org'),
    ],

];
