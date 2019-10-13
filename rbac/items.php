<?php
return [
    'getUsers' => [
        'type' => 2,
        'description' => 'Get information about users',
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'getUsers',
        ],
    ],
];
