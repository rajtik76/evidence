<?php declare(strict_types=1);

return [
    'flash' => [
        'deleteSuccess' => 'Successfully deleted department `:name`',
        'deleteFailed' => 'Deleted department `:name` failed. Reason: `:reason`',
        'updateSuccess' => 'Department `:name` updated',
        'storeSuccess' => 'Department `:name` was successfully created',
    ],

    'index' => [
        'title' => 'Department list',
        'table' => [
            'id' => 'Id',
            'name' => 'Department name',
            'actions' => [
                'edit' => 'Edit',
                'delete' => 'Delete',
                'new' => 'New Department',
            ],
        ],
    ],

    'edit' => [
        'title' => 'Edit department',
        'name' => 'Department name',
        'submit' => 'Save',
        'helpBlocks' => [
            'name' => 'Department name length must be between 6 and 255 characters and must be unique'
        ],
    ],

    'new' => [
        'title' => 'New department',
    ],
];
