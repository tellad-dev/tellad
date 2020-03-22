<?php

use Illuminate\Database\Seeder;
use App\Models\Ad;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Ad::create([
                'user_id' => $i,
                'overview' => $faker->realText(),
            ]);
        }
    }
}
