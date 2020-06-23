<?php

return [
    'role_structure' => [
        'superadmin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'departments' => 'c,r,u,d',
            'holidays' => 'c,r,u,d',
            'tokens' => 'r,u,d',
            'logs' => 'r,d',
        ],
        'admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'departments' => 'c,r,u,d',
            'holidays' => 'c,r,u,d',
            'tokens' => 'r,u,d',
            'logs' => 'r,d',
        ],
    ],

    /** not using (`user has permissions but no role` logic )*/
    // 'permission_structure' => [
    //     'cru_user' => [
    //         'profile' => 'c,r,u'
    //     ],
    // ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'view',
        'u' => 'edit',
        'd' => 'delete'
    ]
];
