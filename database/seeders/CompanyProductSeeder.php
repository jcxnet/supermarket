<?php

namespace Database\Seeders;

use App\Data\Models\Company;
use App\Data\Models\CompanyProduct;
use App\Data\Models\Product;
use Illuminate\Database\Seeder;

class CompanyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::paginate(10);
        $products = Product::paginate(10);

        foreach ($companies as $company){
            foreach ($products as $product){
                $add = rand(1,10);
                if ($add % 2){
                    CompanyProduct::firstOrCreate([
                        'company_id' => $company->id,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
    }
}
