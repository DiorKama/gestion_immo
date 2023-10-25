<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingType>
 */
class ListingTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucwords(fake()->words(5, true));

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
