<?php

use App\Services\ImageResize;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use Propaganistas\LaravelPhone\PhoneNumber;

if (!function_exists('entity_type')) {
    /**
     * Consult morphMap to figure out entity type based on class of parameter.
     *
     * @param Illuminate\Database\Eloquent\Model $object
     *
     * @return null|string
     */
    function entity_type(
        $object
    ) {
        static $morphMap;

        $entityType = data_get($object, 'entityType');
        if ($entityType) {
            return $entityType;
        }

        if (!isset($morphMap)) {
            $morphMap = array_flip(Illuminate\Database\Eloquent\Relations\Relation::morphMap());
        }

        $entityType = data_get($morphMap, get_class($object));

        return $entityType;
    }
}

if (!function_exists('fullImageUrl')) {

    /**
     * @param string $resizeType
     * @param string $fullS3ImageUrl
     * @param array|null $imageParams
     *
     * @return string
     */
    function fullImageUrl(
        string $resizeType,
        string $fullS3ImageUrl,
        array $imageParams = null
    ) {
        return (new ImageResize)->buildUrl(
            $resizeType,
            $fullS3ImageUrl,
            $imageParams ?: []
        );
    }
}

if (!function_exists('upload_config')) {
    function upload_config(
        string $key = null,
        $default = null
    ) {
        $filesConfig = collect(array_replace_recursive(config('upload.group.listing'), config('listings.upload.group')))
            ->filter(function ($value) {
                return Arr::get($value, 'enabled');
            })
            ->all();

        return $key
            ? Arr::get($filesConfig, "{$key}", $default)
            : ($filesConfig ?: $default);
    }
}

if (!function_exists('jsend')) {
    function jsend($options)
    {
        if (is_bool($options)) {
            $options = ['status' => $options ? 'success' : 'fail'];
        }

        $status = Arr::get($options, 'status');

        switch ($status) {
            case 'success':
                $statusCode = Symfony\Component\HttpFoundation\Response::HTTP_OK;
                break;

            case 'fail':
                $statusCode = Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY;
                break;

            case 'error':
                $statusCode = Arr::get(
                    $options,
                    'status_code',
                    Symfony\Component\HttpFoundation\Response::HTTP_INTERNAL_SERVER_ERROR
                );
                break;

            default:
                throw new Exception('Incorrect use of jsend global method');
        }

        $data = [
            'status' => $status,
            'message' => Arr::get($options, 'message'),
            'code' => Arr::get($options, 'code'),
            'data' => array_merge(
                array_filter(
                    Arr::only(
                        $options,
                        [
                            'exception',
                            'file',
                            'line',
                            'trace',
                        ]
                    )
                ),
                Arr::get($options, 'data') ?: []
            ),
        ];

        if (Arr::get($options, 'location')) {
            $data['location'] = Arr::get($options, 'location');
        }

        return response()
            ->json(
                $data,
                $statusCode
            );
    }
}

if (!function_exists('formatFrenchDate')) {
    function formatFrenchDate($date)
    {
        $carbonDate = new Carbon($date);
        return $carbonDate->isoFormat('lll');
    }
}

if (!function_exists('money_format')) {
    function money_format(
        $value = 0,
        int $decimals = null,
        string $currencyISO = null
    ) {
        $currency = $currencyISO
            ? $currencyISO
            : config('core.currency_iso');

        $money = new Money(
            is_int($value)
                ? sprintf('%d', $value)
                : $value,
            new Currency($currency)
        );

        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('fr_SN', \NumberFormatter::DECIMAL);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        $money = trim(
            str_replace(
                [
                    ':value',
                    ':symbol',
                ],
                [
                    $moneyFormatter->format($money),
                    config('core.currency_symbol', ''),
                ],
                config('core.money_format')
            )
        );

        return $money;
    }
}

if (!function_exists('listing_price')) {
    function listing_price(
        $listing,
        $price = null
    ) {
        if (
            is_null($price)
            && isset($listing->price)
            && !empty($listing->price)
        ) {
            $price = $listing->price;
        }

        if (
            !is_null($price)
            && $price > 0
        ) {
            $price = money_format($price);
        } else {
            $price = '';
        }

        return (string) $price;
    }
}

if (! function_exists('shortRelativeDate')) {
    function shortRelativeDate(
        $datetime,
        bool $includeTime = true
    ) {
        $date = Carbon::parse($datetime);

        $output = '';

        if ($date->isToday()) {
            $output .= __('Aujourd\'hui');
        } elseif ($date->isYesterday()) {
            $output .= __('Hier');
        } elseif ($date->diffInDays(Carbon::now()->subWeek(1)) < 7) {
            $output .= $date->translatedFormat('l');
        } elseif ($date->year === Carbon::now()->year) {
            $output .= $date->translatedFormat('j. M');
        } else {
            $output .= $date->translatedFormat('j. M \'y');
        }

        if ($includeTime) {
            $output .= ', ' . $date->translatedFormat('H:i');
        }

        return $output;
    }
}

if (!function_exists('whatsapp_url')) {
    function whatsapp_url(
        string $phone,
        string $message,
        bool $isMobile = false
    ) {
        return $isMobile
            ? sprintf(
                config('core.contact.whatsapp.api.mobile-url'),
                http_build_query(
                    [
                        'text' => $message,
                        'phone' => $phone,
                        'abid' => $phone,
                    ]
                )
            )
            : sprintf(
                config('core.contact.whatsapp.api.url'),
                str_replace([' ', '+'], '', $phone),
                urlencode($message)
            );
    }
}

if (!function_exists('listing_url')) {
    function listing_url(
        $listing,
        array $params = []
    ) {
        return route(
            'listings.show',
            array_merge(
                $params,
                [
                    'slug' => $listing->slug,
                    'id' => $listing->id,
                ]
            )
        );
    }
}

if (!function_exists('contact_whatsapp')) {
    function contact_whatsapp(
        $listing,
        $setting = null
    ) {
        $whatsappText = __(
            'Salut, je suis intéressé par votre bien immobilier : :listingUrl sur :companyName',
            [
                'companyName' => $setting->name,
                'listingUrl' => listing_url($listing),
            ]
        );

        return [
            'value' => $setting->mobile_number,
            'message' => $whatsappText,
            'mobile' => whatsapp_url(
                $setting->mobile_number,
                $whatsappText,
                true
            ),
            'desktop' => whatsapp_url(
                $setting->mobile_number,
                $whatsappText,
                false
            ),
        ];
    }
}

if (! function_exists('phone')) {
    function phone($number, $country = [], $format = null)
    {
        $phone = PhoneNumber::make($number, $country);

        if (! is_null($format)) {
            return $phone->format($format);
        }

        return $phone;
    }
}

if (!function_exists('format_phone_number_local_display')) {
    function format_phone_number_local_display(
        string $mobileNumber,
        string $mobileNumberCountry = null
    ) {
        try {
            return phone($mobileNumber, $mobileNumberCountry)
                ->formatForMobileDialingInCountry(
                    'SN'
                );
        } catch (Exception $e) {
        }

        return null;
    }
}

if (!function_exists('contact_phone')) {
    function contact_phone(
        $listing,
        $setting = null
    ) {
        return [
            'value' =>
                format_phone_number_local_display($setting->mobile_number)
                ?? $setting->mobile_number,
            'tel' => str_replace(' ', '', $setting->mobile_number),
        ];
    }
}
