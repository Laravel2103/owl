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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    //khai báo id trang quản lý trong facebook
    'facebook' => [
        'client_id' => '302329893933910',  
        'client_secret' => '589229750f6769a64f04a2e6ee4f0ce2',
        'redirect' => 'http://localhost/owl/public/facebook/callback',
    ],
    //khai báo id trang quản lý trong API google
    'google' => [
        'client_id' => '808500464502-httimnlj7huk7i0f7r9i0gfee1bdp8ge.apps.googleusercontent.com',
        'client_secret' => '044SEcqDvrZb7SEbeMwmxSyt',
        'redirect' => 'http://localhost/owl/public/google/callback',
    ],
];
