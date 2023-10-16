<?php

namespace Database\Seeders;

use App\Models\FeaturedListing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturedListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeaturedListing::factory()
            ->count(5)
            ->create();
    }
}
