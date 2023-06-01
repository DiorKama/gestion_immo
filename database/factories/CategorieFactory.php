<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    protected $model = Categorie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentIds = Categorie::pluck('id')->toArray(); 
        return [
            'libelle' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'parent_id' => $this->faker->optional()->randomElement($parentIds),
        ];
    }
}
