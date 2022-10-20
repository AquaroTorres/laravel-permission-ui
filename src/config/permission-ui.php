<?php

return [
    /**
     * If you add additional columns to migration
     * example:
     *     'extra_columns' => [
     *         'description',
     *    ],
     */
    
    'extra_columns' => [
        'description',
    ],
    
    /**
     * Recomended middlewares: web, auth, can: some_permission
     */
    'middlewares' => [
        'web'
    ]
];