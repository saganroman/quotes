<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'pkgstore' => [
        'url' => env('PKG_STORE_URL', 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json')
    ],

    'yh-finance' => [
        'root_url' => env('YH_FINANCE_ROOT_URL', 'https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data'),
        'header_parameters' => [
            'x-rapidapi-key' => env('YH_FINANCE_X_RAPIDAPI_KEY',''),
            'x-rapidapi-host' => env('YH_FINANCE_X_RAPIDAPI_HOST',''),
        ]
    ]

];
