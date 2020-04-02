<?php

use Illuminate\Database\Seeder;
use App\Models\CustomerFeature;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class CustomerFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 3; $i++) {
            CustomerFeature::create([
                'customer_feature' => Arr::random(['カップル','ファミリー','ご年配']),
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
