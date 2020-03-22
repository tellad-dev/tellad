<?php

use Illuminate\Database\Seeder;
use App\Models\Address;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 50; $i++) {
            Address::create([
                'addressable_id' => $i,
                'addressable_type' => 'App\Models\Users',
                'postcode' => $faker->postcode(),
                'prefecture' => $faker->prefecture(),
                'city' => $faker->city(),
                'block' => $faker->streetAddress(),
            ]);
        }
        for ($i = 51; $i <= 100; $i++) {
            Address::create([
                'addressable_id' => $i,
                'addressable_type' => 'App\Models\Shops',
                'postcode' => $faker->postcode(),
                'prefecture' => $faker->prefecture(),
                'city' => $faker->city(),
                'block' => $faker->streetAddress(),
            ]);
        }
    }
}
