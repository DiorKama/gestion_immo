<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['title' => 'Dakar', 'slug' => 'dakar', 'country' => 'SN',],
            ['title' => 'Diourbel', 'slug' => 'diourbel', 'country' => 'SN',],
            ['title' => 'Fatick', 'slug' => 'fatick', 'country' => 'SN',],
            ['title' => 'Kaolack', 'slug' => 'kaolack', 'country' => 'SN',],
            ['title' => 'Kolda', 'slug' => 'kolda', 'country' => 'SN',],
            ['title' => 'Louga', 'slug' => 'louga', 'country' => 'SN',],
            ['title' => 'Matam', 'slug' => 'matam', 'country' => 'SN',],
            ['title' => 'Saint-Louis', 'slug' => 'saint-louis', 'country' => 'SN',],
            ['title' => 'Tambacounda', 'slug' => 'tambacounda', 'country' => 'SN',],
            ['title' => 'Thiès', 'slug' => 'thies', 'country' => 'SN',],
            ['title' => 'Ziguinchor', 'slug' => 'ziguinchor', 'country' => 'SN',],
            ['title' => 'Sédhiou', 'slug' => 'sedhiou', 'country' => 'SN',],
            ['title' => 'Kaffrine', 'slug' => 'kaffrine', 'country' => 'SN',],
            ['title' => 'Kedougou', 'slug' => 'kedougou', 'country' => 'SN',],
            ['title' => 'Autres', 'slug' => 'autres', 'country' => 'SN',]
        ];

        foreach ($regions as $region) {
            Region::factory()->create([
                'title' => $region['title'],
                'country_id' => Country::where(['iso' => $region['country']])->first()->id,
                'slug' => $region['slug'],
            ]);
        }
    }
}
