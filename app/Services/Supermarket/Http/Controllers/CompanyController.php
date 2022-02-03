<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Services\Supermarket\Features\Company\AddCompanyFeature;
use App\Services\Supermarket\Features\Company\DeleteCompanyFeature;
use App\Services\Supermarket\Features\Company\GetCompaniesFeature;
use App\Services\Supermarket\Features\Company\GetCompanyFeature;
use App\Services\Supermarket\Features\Company\UpdateCompanyFeature;
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
