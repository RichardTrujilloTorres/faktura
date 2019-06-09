<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Storage
    |--------------------------------------------------------------------------
    |
    | Local file storage directory.
    */
    'storage' => [
        'directory' => env('STORAGE_DIR', 'invoices'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Url
    |--------------------------------------------------------------------------
    |
    | Project related urls.
    */
    'url' => [
        'github' => env('FAKTURA_GITHUB_URL', 'https://github.com/RichardTrujilloTorres/faktura'),
        'docs' => env('FAKTURA_DOCS_URL', ''),
    ],
];
