<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
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
            'slug' => Str::slug($title, '-'),
            'enabled' => true,
            'country_id' => Country::where(['iso' => 'SN'])->inRandomOrder()->take(1)->first()->id,
            'region_id' => Region::inRandomOrder()->take(1)->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
