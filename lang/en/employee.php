<?php declare(strict_types=1);

return [
    'flash' => [
        'deleteSuccess' => 'Successfully deleted employee `:name`',
        'deleteFailed' => 'Deleted employee `:name` failed. Reason: `:reason`',
        'updateSuccess' => 'Employee `:name` updated',
        'storeSuccess' => 'Employee `:name` was successfully created',
    ],

    'index' => [
        'title' => 'Employee list',
        'table' => [
            'id' => 'Id',
            'firstName' => 'First name',
            'lastName' => 'Last name',
            'department' => 'Department',
            'salary' => 'Salary',
            'actions' => [
                'edit' => 'Edit',
                'delete' => 'Delete',
                'new' => 'New Employee',
            ],
        ],
    ],

    'edit' => [
        'title' => 'Edit Employee',
        'name' => 'Employee name',
        'submit' => 'Save',
        'helpBlocks' => [
            'name' => 'Employee name length must be between 6 and 255 characters and must be unique'
        ],
    ],

    'new' => [
        'title' => 'New Employee',
    ],
];
