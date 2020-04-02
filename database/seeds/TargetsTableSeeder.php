<?php

use Illuminate\Database\Seeder;
use App\Models\Target;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class TargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 3; $i++) {
            Target::create([
                'target' => Arr::random(['駅近','カップル','オフィス街']),
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
