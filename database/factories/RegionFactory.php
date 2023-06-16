<?php

namespace Database\Factories;

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
            'slug' => Str::slug($title, '-'),
            'enabled' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
