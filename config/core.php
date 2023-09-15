<?php

return [
    'currency_iso' => 'XOF',
    'currency_symbol' => 'F CFA',
    'money_format' => ':value <span class="font-weight-lighter">:symbol</span>',
    'share' => [
        'whatsapp' => 'whatsapp://send?text=',
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=',
        'twitter' => 'https://twitter.com/intent/tweet?url=',
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=',
    ],
    'contact' => [
        'default-customer-service' => '+221766448613',
        'whatsapp' => [
            'api' => [
                'mobile-url' => 'whatsapp://send?%s',
                'url' => 'https://wa.me/%s?text=%s',
            ],
        ],
    ],
];
