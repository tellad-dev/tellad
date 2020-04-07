<?php

use Illuminate\Database\Seeder;
use App\Models\AdImage;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class AdImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            AdImage::create([
                'ad_id' => $i,
                'path' => 'S3_BUCKET_NAME'.$i,
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
