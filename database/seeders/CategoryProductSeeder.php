<?php

namespace Database\Seeders;

use App\Data\Models\Category;
use App\Data\Models\CategoryProduct;
use App\Data\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::paginate(10);
        $products = Product::paginate(10);

        foreach ($categories as $category){
            foreach ($products as $product){
                $add = rand(1,10);
                if ($add % 2){
                    CategoryProduct::firstOrCreate([
                        'category_id' => $category->id,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
    }
}
