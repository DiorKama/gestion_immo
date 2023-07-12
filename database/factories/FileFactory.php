<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\File;
use App\Models\Banner;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entity_id' => function () {
                return Banner::pluck('id')->random();
            },
            'entity_type' => Str::slug(class_basename(Banner::class), '-'),
            'url' => fake()->imageUrl(),
            'sort_order' => fake()->randomDigit(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
    }
}
