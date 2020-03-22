<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create();
        $this->call([
            ShopsTableSeeder::class,
            SpacesTableSeeder::class,
            AdsTableSeeder::class,
            RequestsTableSeeder::class,
            AddressesTableSeeder::class,
            ProfilesTableSeeder::class,
            // ImagesTableSeeder::class,
            // AdFormssTableSeeder::class,
            // CustomerFeaturessTableSeeder::class,
            // ShopFeaturessTableSeeder::class,
            ]);
        // factory(App\Models\Space::class, 50)->create();
        // factory(App\Models\Ad::class, 50)->create();
        // factory(App\Models\Request::class, 50)->create();
        // factory(App\Models\Address::class, 50)->create();
        // factory(App\Models\Profile::class, 50)->create();
        // factory(App\Models\Image::class, 50)->create();
        // factory(App\Models\AdForm::class, 50)->create();
        // factory(App\Models\CustomerFeature::class, 50)->create();
        // factory(App\Models\ShopFeature::class, 50)->create();
    }
}
