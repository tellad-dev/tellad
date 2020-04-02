<?php

use Illuminate\Database\Seeder;
use App\Models\AdTargetTagging;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class AdTargetTaggingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            AdTargetTagging::create([
                'ad_id' => $i,
                'target_id' => Arr::random([1,2,3]),
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
