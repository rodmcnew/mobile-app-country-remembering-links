<?php
return [
    'MobileAppToSite' => [
        'thisControllersRoute' => '/from-app',
        'cookieName' => 'from-app-url-prepend',
        'toUrls' => [
            'United States' => '',
            'Australia' => '',
            'Canada' => '',
            'Indonesia' => '',
            'Malaysia' => '',
            'New Zealand' => '',
            'Philippines' => '',
            'Singapore' => '',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
