<?php declare(strict_types=1);

return [
    'base' => [
        'table' => [
            'id' => 'Id',
            'name' => 'Jméno',
            'email' => 'Email',
        ],
        'confirm' => [
            'areYouSure' => 'Jste si jistí ?',
        ],
    ],

    'list' => [
        'title' => 'Seznam uživatelů',
        'table' => [
            'actions' => [
                'title' => 'Akce',
                'edit' => 'Editace',
                'delete' => 'Smazat',
                'new' => 'Nový Uživatel',
            ],
        ],
    ],

    'edit' => [
        'title' => 'Editace uživatele',
        'placeholders' => [
            'name' => 'Uživatelské jméno',
            'email' => 'Emailová adresa',
            'password' => 'Uživatelské heslo',
            'password_confirmation' => 'Potvrzení uživatelského hesla',
            'isAdmin' => 'Admin práva',
        ],
        'helpBlocks' => [
            'name' => 'Uživatelské jméno musí být 3-255 znaků dlouhé.',
            'password' => 'Heslo musí být 6-20 znaků dlouhé.',
        ],
        'submit' => 'Odeslat',
    ],

    'new' => [
        'title' => 'Nový uživatel',
    ],
];
