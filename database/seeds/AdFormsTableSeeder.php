<?php

use Illuminate\Database\Seeder;
use App\Models\AdForm;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class AdFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            AdForm::create([
                'ad_id' => $i,
                'form' => Arr::random(['A3広告','ポップアップスタンド','A4広告']),
                // 'key' => $faker->md5(),
            ]);
        }
    }
}
