<?php

return [
    /**
     * If you add additional columns to migration
     * example:
     *     'permissions_extra_columns' => [
     *         'description',
     *    ],
     */
    
    'permissions_extra_columns' => [
        'description',
    ],

    'roles_extra_columns' => [
        'description',
    ],
    
    /**
     * Recomended middlewares: web, auth, can: some_permission
     */
    'middlewares' => [
        'web'
    ]
];