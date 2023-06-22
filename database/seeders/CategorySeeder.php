<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Category::factory(5)->create();
    //      Category::factory()
    //             ->count(5)
    //             ->state(new Sequence(
    //                 fn (Sequence $sequence) => ['parent_id' => Category::whereNull('parent_id')->inRandomOrder()->first()],
    //             ))
    //             ->create();
    // }


    public function run()
    {
        // Enregistrement des données initiales pour les catégories parent et enfant
        $categories = [
            [
                'parent' => [
                    'title' => 'Immobilier','slug' => 'immobilier',
                ],
                'children' => [
                    ['title' => 'Maisons de vacances','slug' => 'maisons-de-vacances',],
                    ['title' => 'Maisons à vendre','slug' => 'maisons-a-vendre',],
                    ['title' => 'Chambres à louer','slug' => 'chambres-a-louer',],
                    ['title' => 'Chambres à louer','slug' => 'chambres-meublees',],
                    ['title' => 'Chambres vide','slug' => 'chambres-vide',],
                    ['title' => 'Terrains à vendre','slug' => 'terrains-a-vendre',],
                    ['title' => 'Appartements meublés','slug' => 'appartements-meubles',],
                    ['title' => 'Propriétés commerciales à louer','slug' => 'proprietes-commerciales-a-louer',],
                    ['title' => 'Appartements à vendre','slug' => 'appartements-a-vendre',],
                    ['title' => 'Maisons à louer','slug' => 'maisons-a-louer',],
                    ['title' => 'Appartements à louer','slug' => 'appartements-a-louer',],
                    ['title' => 'Propriétés commerciales à vendre','slug' => 'proprietes-commerciales-a-vendre',],
                ]
            ],
        ];

        foreach ($categories as $category) {
            $parent = $category['parent'];
            $children = $category['children'];

            Category::factory()->create($parent);
            foreach($children as $child) {
                Category::factory()->state(new Sequence(
                    fn (Sequence $sequence) => ['parent_id' => Category::whereNull('parent_id')->inRandomOrder()->first()],
                ))
                ->create([
                    'title' => $child['title'],
                    'slug'  => $child['slug'],
                  ]);
            }
        }
    }
}
