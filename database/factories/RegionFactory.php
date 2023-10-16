<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->city();

        return [
            'title' => $title,
            'country_id' => Country::inRandomOrder()->take(1)->first()->id,
            'slug' => Str::slug($title, '-'),
            'enabled' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
