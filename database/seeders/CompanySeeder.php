<?php

namespace Database\Seeders;

use App\Data\Models\Company;
use App\Data\Models\Contact;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(10)->create()->each(function ($company){
            $max = rand(1,5);
            $contacts = Contact::factory(['company_id' => $company->id])->count($max)->create();
            $company->contacts()->saveMany($contacts);
        });
    }
}
