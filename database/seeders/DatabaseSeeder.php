<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FileSeeder;
use Database\Seeders\BannerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            LocationSeeder::class,
            CategorySeeder::class,
            ListingStatusesSeeder::class,
            ListingSeeder::class,
            BannerSeeder::class,
            FileSeeder::class,
        ]);
    }
}
