<?php

use Illuminate\Database\Seeder;
use App\Models\Request;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Request::create([
                'space_id' => $i,
                'ad_id' => $i,
                'sender_id' => $i,
                'receiver_id' => 51-$i,
                'start_date' => date('Y-m-d', strtotime(Arr::random([1,2,3]).' week')),
                'order_price' => Arr::random([1000,2000,3000,4000,5000]),
                'span' => Arr::random(['1ヶ月','2ヶ月','3ヶ月']),
                'status' => Arr::random([0,1,2,3,4]),
                'message' => $faker->realText,
                'key' => $faker->md5(),
            ]);
        }
    }
}
