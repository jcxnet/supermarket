<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Company\Features\AddCompanyFeature;
use App\Domains\Company\Features\DeleteCompanyFeature;
use App\Domains\Company\Features\GetCompaniesFeature;
use App\Domains\Company\Features\GetCompanyFeature;
use App\Domains\Company\Features\UpdateCompanyFeature;
use Lucid\Units\Controller;

class CompanyController extends Controller
{
    public function add()
    {
        return $this->serve(AddCompanyFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetCompanyFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetCompaniesFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateCompanyFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteCompanyFeature::class, ['id' => $id]);
    }
}
