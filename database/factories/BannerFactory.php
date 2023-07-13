<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => ucwords(fake()->words(5, true)),
            'url' => fake()->url(),
            'type_banner' => fake()->randomElement(array_keys(config('banners.types'))),
            'enabled' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
