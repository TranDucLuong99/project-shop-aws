<?php
return [
    's3' => [
        'region' => env('AWS_DEFAULT_REGION'),
        'key'    => env('AWS_ACCESS_KEY_ID'), //Access key
        'secret' => env('AWS_SECRET_ACCESS_KEY'), //Secret key
        'bucket' => env('AWS_BUCKET'),
    ],
    'root_user' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
    ],

    'kms' => [
        'key' => env('KEY_ARN'),
    ],
];
