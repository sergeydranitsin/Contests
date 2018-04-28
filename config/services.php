<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'vkontakte' => [
        'client_id' => '6463721',
        'client_secret' => 'AKkjcXFy5LgFIsIEENDs',
        'redirect' => 'http://localhost/login/vk/callback',
//        'client_id' => env('VKONTAKTE_KEY'),
//        'client_secret' => env('VKONTAKTE_SECRET'),
//        'redirect' => env('VKONTAKTE_REDIRECT_URI'),
    ],

    'odnoklassniki' => [
        'client_id' => '1266105344',
        'client_public' => 'CBANDIHMEBABABABA',
        'client_secret' => '4DE10C04C011F68D0D303A80',
        'redirect' => 'http://localhost/login/ok/callback',
//        'client_id' => env('ODNOKLASSNIKI_ID'),
//        'client_secret' => env('ODNOKLASSNIKI_SECRET'),
//        'client_public' => env('ODNOKLASSNIKI_PUBLIC'),
//        'redirect' => env('ODNOKLASSNIKI_REDIRECT'),
    ],

];
