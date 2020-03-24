<?php

use Illuminate\Database\Seeder;
use App\Models\Space;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class SpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Space::create([
                'user_id' => $i,
                'shop_id' => $i,
                'location' => Arr::random(['カウンター上','入り口扉','レジ横']),
                'overview' => $faker->realText(),
                'monthly_price' => Arr::random([1000,2000,3000,4000,5000]),
                'receiving' => Arr::random([1,2,3,4,5]),
                'receiving_limit' => 5,
                'key' => $faker->md5(),
            ]);
        }
    }
}
