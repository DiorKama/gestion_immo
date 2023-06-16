<?php

namespace Database\Seeders;

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
            ['title' => 'Dakar','slug' => 'dakar'],
            ['title' => 'Diourbel','slug' => 'diourbel'],
            ['title' => 'Fatick','slug' => 'fatick'],
            ['title' => 'Kaolack','slug' => 'kaolack'],
            ['title' => 'Kolda','slug' => 'kolda'],
            ['title' => 'Louga','slug' => 'louga'],
            ['title' => 'Matam','slug' => 'matam'],
            ['title' => 'Saint-Louis','slug' => 'saint-louis'],
            ['title' => 'Tambacounda','slug' => 'tambacounda'],
            ['title' => 'Thiès','slug' => 'thies'],
            ['title' => 'Ziguinchor','slug' => 'ziguinchor'],
            ['title' => 'Sédhiou','slug' => 'sedhiou'],
            ['title' => 'Kaffrine','slug' => 'kaffrine'],
            ['title' => 'Kedougou','slug' => 'kedougou'],
            ['title' => 'Autres','slug' => 'autres']
        ];

        foreach ($regions as $region) {
            Region::factory()->create($region);
        }
    }
}
