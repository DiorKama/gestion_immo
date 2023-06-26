<?php

namespace Database\Seeders;

use App\Models\ListingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use function Symfony\Component\String\Slugger\slug;

class ListingStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listing_statuses = config('listings.statuses');

        foreach ($listing_statuses as $statusTitle => $statusId) {
            ListingStatus::factory()->create([
                'id' => $statusId,
                'title' => $statusTitle,
                'slug' => Str::slug($statusTitle, '-'),
            ]);
        }
    }
}
