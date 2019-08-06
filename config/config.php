<?php

return [
    'category' => [
        'type' => [
            'post' => 0,
            'document' => 1,
            'example' => 2,
        ],
        'name' => [
            'primary' => 1,
            'secondary' => 2,
            'high' => 3,
        ],
    ],
    'document' => [
        'type' => [
            'free' => 0,
            'pay' => 1,
        ],
        'convert' => [
            'yes' => 1,
            'no' => 0,
        ],
        'url' => [
            'preview' => '/upload/preview/',
            'file' => '/upload/document/file/',
        ],
    ],
];
