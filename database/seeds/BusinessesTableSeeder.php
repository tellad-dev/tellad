<?php

use Illuminate\Database\Seeder;
use App\Models\Business;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class BusinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Business::create([
                'user_id' => $i,
                'industory' => Arr::random(['不動産','広告業','IT企業']),
                'business' => $faker->realText(),
                'key' => $faker->md5(),
            ]);
        }
    }
}
