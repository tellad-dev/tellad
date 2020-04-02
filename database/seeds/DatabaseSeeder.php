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
        // factory(App\Models\User::class, 50)->create();
        $this->call([
            UsersTableSeeder::class,
            ShopsTableSeeder::class,
            ProfilesTableSeeder::class,
            BusinessesTableSeeder::class,
            AdsTableSeeder::class,
            ShopsTableSeeder::class,
            SpacesTableSeeder::class,
            AdRequestsTableSeeder::class,
            AdFormsTableSeeder::class,
            SpaceFormsTableSeeder::class,
            CustomerFeaturesTableSeeder::class,
            ShopFeaturesTableSeeder::class,
            AdImagesTableSeeder::class,
            ShopImagesTableSeeder::class,
            SpaceImagesTableSeeder::class,
            TargetsTableSeeder::class,
            AdTargetTaggingsTableSeeder::class,
            ShopCustomerFeatureTaggingsTableSeeder::class,
            ShopShopFeatureTaggingsTableSeeder::class,
            ]);
    }
}
