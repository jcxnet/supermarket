<?php

namespace Database\Seeders;

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
        $this->call([
            CompanySeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CategoryProductSeeder::class,
            CompanyProductSeeder::class,
            StoreSeeder::class,
            StoreProductSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
