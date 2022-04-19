<?php declare(strict_types=1);

return [
    'flash' => [
        'deleteSuccess' => 'Úspěšně smazáno oddělení `:name`',
        'deleteFailed' => 'Mazání oddělení `:name` selhalo. Důvod: `:reason`',
        'updateSuccess' => 'Oddělení `:name` aktualizováno',
        'storeSuccess' => 'Oddělení `:name` bylo úspěšně vytvořeno',
    ],

    'index' => [
        'title' => 'Seznam oddělení',
        'table' => [
            'id' => 'Id',
            'name' => 'Název oddělení',
            'actions' => [
                'edit' => 'Editace',
                'delete' => 'Smazat',
                'new' => 'Nové oddělení',
            ],
        ],
    ],

    'edit' => [
        'title' => 'Editace oddělení',
        'name' => 'Název oddělení',
        'submit' => 'Uložit',
        'helpBlocks' => [
            'name' => 'Délka názvu oddělení musí být mezi 6 a 255 znaky a také musí být unikátní'
        ],
    ],

    'new' => [
        'title' => 'Nové oddělení',
    ],
];
