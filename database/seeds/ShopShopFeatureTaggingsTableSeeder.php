<?php

use Illuminate\Database\Seeder;
use App\Models\ShopShopFeatureTagging;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ShopShopFeatureTaggingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            ShopShopFeatureTagging::create([
                'shop_id' => $i,
                'shop_feature_id' => Arr::random([1,2,3]),
                'key' => $faker->md5(),
            ]);
        }
    }
}
