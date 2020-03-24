<?php

use Illuminate\Database\Seeder;
use App\Models\ShopFeature;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ShopFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 3; $i++) {
            ShopFeature::create([
                'shop_feature' => Arr::random(['駅近','住宅街','オフィス街']),
                'key' => $faker->md5(),
            ]);
        }
    }
}
