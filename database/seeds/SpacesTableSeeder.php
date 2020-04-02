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
                'shop_id' => $i,
                'location' => Arr::random(['カウンター上','入り口扉','レジ横']),
                'overview' => $faker->realText(),
                'key' => $faker->md5(),
            ]);
        }
    }
}
