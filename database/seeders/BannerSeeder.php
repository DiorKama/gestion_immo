<?php
namespace Database\Seeders;

use App\Models\File;
use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0 ; $i<=10; $i++){
            $banner = Banner::factory()->create();

            if ( $banner ) {
                File::factory()->count(2)->create([
                    'entity_id' => $banner->id,
                    'entity_type' => 'banner',
                ]);
            }
        }
    }
}
