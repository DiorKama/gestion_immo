<?php
namespace Database\Factories;
use App\Models\ListingStatus;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = ucwords(fake()->words(5, true));

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => fake()->text(),
            'area' => fake()->numberBetween(50, 200),
            'rooms' => fake()->numberBetween(1, 5),
            'bedrooms' => fake()->numberBetween(1, 3),
            'bathrooms' => fake()->numberBetween(1, 2),
            'price' => fake()->numberBetween(10000, 500000),
            'sold' => false,
            'location_id' => Location::inRandomOrder()->take(1)->first()->id,
            'user_id' => User::inRandomOrder()->take(1)->first()->id,
            'category_id' => Category::inRandomOrder()->take(1)->first()->id,
            'listing_status_id' => config('listings.statuses.active'),
            'disable_at' => null,
            'first_online_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
