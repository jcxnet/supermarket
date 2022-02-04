<?php

namespace Database\Seeders;

use App\Data\Models\Product;
use App\Data\Models\Store;
use App\Data\Models\StoreProduct;
use Illuminate\Database\Seeder;

class StoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::paginate(10);
        $products = Product::paginate(10);

        foreach ($stores as $store){
            foreach ($products as $product){
                $add = rand(1,10);
                if ($add % 2){
                    StoreProduct::firstOrCreate([
                        'store_id' => $store->id,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
    }
}
