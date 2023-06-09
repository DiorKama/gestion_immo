<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
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
            'enabled' => true,
            'description' => fake()->text(),
        ];
    }
    public function withParent()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::inRandomOrder()->take(1)->first()->id,
            ];
        });
    }
}
