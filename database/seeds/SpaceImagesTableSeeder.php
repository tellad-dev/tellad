<?php

use Illuminate\Database\Seeder;
use App\Models\SpaceImage;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class SpaceImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            SpaceImage::create([
                'space_id' => $i,
                'path' => 'S3_BUCKET_NAME'.$i,
                'key' => $faker->md5(),
            ]);
        }
    }
}
