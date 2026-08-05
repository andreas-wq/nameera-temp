<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Nameera Template Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk tema dan komponen Nameera Template.
    |
    */

    'version' => '1.0.0',

    'theme' => [
        'primary' => '#3b82f6',
        'secondary' => '#6b7280',
        'accent' => '#8b5cf6',
        'background' => '#f9fafb',
        'text' => '#111827',
    ],

    'plugins' => [
        'tinymce' => [
            'version' => '7',
            'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js',
        ],
        'flatpickr' => [
            'cdn' => 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js',
        ],
        'filepond' => [
            'cdn' => 'https://unpkg.com/filepond@^4/dist/filepond.js',
        ],
        'choices' => [
            'cdn' => 'https://cdn.jsdelivr.net/npm/choices.js@9.1.2/public/assets/scripts/choices.min.js',
        ],
    ],

    'paths' => [
        'stubs' => base_path('stubs/nameera'),
        'assets' => public_path('vendor/nameera'),
    ],
];