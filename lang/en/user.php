<?php declare(strict_types=1);

return [
    'base' => [
        'table' => [
            'id' => 'Id',
            'name' => 'Name',
            'email' => 'Email',
        ],
        'confirm' => [
            'areYouSure' => 'Are you sure ?',
        ],
    ],

    'list' => [
        'title' => 'User list',
        'table' => [
            'actions' => [
                'title' => 'Actions',
                'edit' => 'Edit',
                'delete' => 'Delete',
                'new' => 'New User',
            ],
        ],
    ],

    'edit' => [
        'title' => 'Edit user',
        'placeholders' => [
            'name' => 'User name',
            'email' => 'Email address',
            'password' => 'User password',
            'password_confirmation' => 'Password confirmation',
            'isAdmin' => 'Admin rights',
        ],
        'helpBlocks' => [
            'name' => 'User name must be 3-255 characters long.',
            'password' => 'Your password must be 6-20 characters long.',
        ],
        'submit' => 'Submit',
    ],

    'new' => [
        'title' => 'New user',
    ],
];
