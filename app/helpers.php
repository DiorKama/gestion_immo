<?php

use App\Services\ImageResize;

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
