<?php

use App\Services\ImageResize;
use Illuminate\Support\Arr;

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
