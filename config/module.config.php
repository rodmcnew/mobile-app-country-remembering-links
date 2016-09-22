<?php
return [
    'MobileAppToSite' => [
        'thisControllersRoute' => '/from-app',
        'cookieName' => 'from-app-url-prepend',
        'toUrls' => [
            'United States' => 'https://reliv.com',
            'Australia' => 'https://relivasiapacific.com.au',
            'Canada' => 'https://relivinc.ca',
            'Indonesia' => 'https://relivasiapacific.co.id',
            'Malaysia' => 'https://relivasiapacific.com.my',
            'New Zealand' => 'https://relivasiapacific.co.nz',
            'Philippines' => 'https://relivasiapacific.com.ph',
            'Singapore' => 'https://relivasiapacific.com.sg',
        ]
    ],
//    'controllers' => [
//        'config_factories' => [
//            'MobileAppToSite\Controller\MobileAppToSiteController' => [
//                'arguments' => ['Config']
//            ]
//        ]
//    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
