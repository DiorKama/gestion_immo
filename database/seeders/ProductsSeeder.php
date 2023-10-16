<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Bon plan - Hebdomadaire',
                'slug' => 'bon-plan-hebdomadaire',
                'enabled' => true,
                'lifetime' => 7,
            ], [
                'title' => 'Bon plan - Mensuel',
                'slug' => 'bon-plan-mensuel',
                'enabled' => true,
                'lifetime' => 30,
            ], [
                'title' => 'Bon plan - Semi-annuel',
                'slug' => 'bon-plan-semi-annuel',
                'enabled' => true,
                'lifetime' => 180,
            ], [
                'title' => 'Bon plan - Annuel',
                'slug' => 'bon-plan-annuel',
                'enabled' => true,
                'lifetime' => 365,
            ],
        ];

        foreach ($products as $product) {
            Product::factory()->create($product);
        }
    }
}
