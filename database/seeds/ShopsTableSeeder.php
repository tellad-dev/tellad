<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Shop::create([
                'user_id' => $i,
                'shop_name' => $faker->lastKanaName.Arr::random(['屋','SHOP','店']),
                'url' => $faker->url,
                'postcode' => $faker->postcode(),
                'prefecture' => $faker->prefecture(),
                'city' => $faker->city(),
                'block' => $faker->streetAddress(),
                'shop_category' => Arr::random(['カフェ','居酒屋','カレー屋']),
                'seats' => $faker->numberBetween(500, 1000),
                'monthly_reach' => $faker->numberBetween(0, 500),
                'measuring_reference' => Arr::random(['レジ','帳票','感覚']),
                'age' => Arr::random([10,20,30,40,50,60]),
                'male_ratio' => $i,
                'famale_ratio' => 100-$i,
                'key' => $faker->md5(),
            ]);
        }
    }
}
