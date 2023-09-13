<?php

return [
    'group' => [
        'listing' => [
            'listing_gallery' => [
                'enabled' => false,
                'file_group' => 'picture',
                'min' => 1,
                'max' => 15,
                'max_size' => 10, // 10MB
                'file_types' => [
                    '.heic',
                    '.heif',
                    '.jpeg',
                    '.jpg',
                    '.png',
                ],
                /*'is_image' => true,
                'info_options' => [
                    'first_is_primary',
                    'file_types',
                    'max',
                    'sell_faster',
                    'multiple_angles',
                ],*/
            ],
            'business_gallery' => [
                'enabled' => false,
                'file_group' => 'picture',
                'is_premium' => false,
                'min' => 0,
                'max' => 15,
                'max_size' => 10, // 10MB
                'file_types' => [
                    '.heic',
                    '.heif',
                    '.jpeg',
                    '.jpg',
                    '.png',
                ],
                /*'is_image' => true,
                'info_options' => [
                    'file_types',
                    'max',
                ],*/
            ],
        ],
    ],
];
