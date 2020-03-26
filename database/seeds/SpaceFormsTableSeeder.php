<?php

use Illuminate\Database\Seeder;
use App\Models\SpaceForm;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class SpaceFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            SpaceForm::create([
                'space_id' => $i,
                'form' => Arr::random(['A3広告','ポップアップスタンド','A4広告']),
                'price' => Arr::random([1000,2000,3000,4000,5000]),
                'receiving' => Arr::random([1,2,3,4,5]),
                'receiving_limit' => 5,
                'key' => $faker->md5(),
            ]);
        }
    }
}
