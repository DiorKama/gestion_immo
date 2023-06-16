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
        Category::factory()
            ->count(3)
            ->create();

        Category::factory()
            ->count(5)
            ->withParent()
            ->create();
    }
}
