<?php

namespace App\Services;

use App\Models\FeaturedListing;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function resolveProduct($product)
    {
        if (is_string($product)) {
            return Cache::rememberForever("_product-slug-$product", function () use ($product) {
                return Product::query()
                    ->where('slug', $product)
                    ->firstOrFail();
            });
        }

        if (is_int($product)) {
            return Cache::rememberForever("_product-id-$product", function () use ($product) {
                return Product::query()
                    ->findOrFail($product);
            });
        }

        return null;
    }

    public function resolveProductIdsFromSlugs(
        array $slugs
    ) {
        sort($slugs);

        return Cache::rememberForever("_product-ids-from-slugs", function () use ($slugs) {
            return Product::query()
                ->select(['id', 'slug'])
                ->whereIn('slug', $slugs)
                ->get()
                ->pluck('id', 'slug')
                ->all();
        });
    }

    public function closeRunning(
        $entity,
        $productSlugs
    ) {

    }

    public function assign(
        $product,
        $entity,
        $properties = [],
        $ttl = null
    ) {
        $product = $this->resolveProduct($product);

        $startAt = isset($properties['start_at'])
            ? Carbon::parse($properties['start_at'])
            : Carbon::now();

        if (is_null($ttl)) {
            $ttl = $product->lifetime;
        }

        $attributes = [
            'featured_status' => config('featured-listings.statuses.running'),
            'product_id' => $product->id,
            'listing_id' => $entity->id,
            'start_at' => $startAt,
            'end_at' => $startAt->copy()->addDays($ttl),
        ];

        $featuredEntity = new FeaturedListing($attributes);

        $result = $featuredEntity->save();

        if ( !$result ) {
            Log::warning(
                'Validation errors saving featured entity',
                [
                    'attributes' => $attributes,
                    'errors' => $featuredEntity->errors()->all(),
                ]
            );
        }

        return $result;
    }
}
