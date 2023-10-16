<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeaturedListing>
 */
class FeaturedListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'listing_id' => fake()->randomElement(
                Listing::query()
                    ->select('listings.id')
                    ->where('listing_status_id' , config('listings.statuses.active'))
                    ->get()
                    ->all()
            )->id,
            'product_id' => 4,
            'featured_status' => config('featured-listings.statuses.running'),
            'start_at' => function () {
                return Carbon::now();
            },
            'end_at' => function () {
                return Carbon::now()->addMonths(3);
            },
        ];
    }
}
