<?php

namespace Database\Seeders;

use App\Models\ListingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ListingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listing_types = config('listings.listing-types');

        foreach ($listing_types as $typeTitle => $typeId) {
            ListingType::factory()->create([
                'id' => $typeId,
                'title' => $typeTitle,
                'slug' => Str::slug($typeTitle, '-'),
            ]);
        }
    }
}
