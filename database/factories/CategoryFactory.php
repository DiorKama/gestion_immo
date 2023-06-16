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
        /*return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->word(),
            'enabled' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'sort_order' => $this->faker->numberBetween(1, 10),
            'properties' => json_encode(['property1' => $this->faker->word, 'property2' => $this->faker->word]),
        ];*/

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
