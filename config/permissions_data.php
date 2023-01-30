<?php

/**
 * @var array permissions
 * first-level key is group name of permission, while array that this key contains are the set of permissions under
 * that group.
 */
return [
    'users' => [
        [
            'name' => 'users.index',
            'label' => 'Can Access List of Users',
        ],
        [
            'name' => 'users.create',
            'label' => 'Can Create Users',
        ],
        [
            'name' => 'users.edit',
            'label' => 'Can Edit Users',
        ],
        [
            'name' => 'users.view',
            'label' => 'Can View Users',
        ],
        [
            'name' => 'users.delete',
            'label' => 'Can Delete Users',
        ]
    ],
];