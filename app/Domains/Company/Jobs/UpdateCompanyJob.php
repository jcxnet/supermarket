<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use App\Data\Repository\CompanyRepositoryInterface;
use App\Domains\Company\Exceptions\CompanyNotFound;
use Lucid\Units\Job;

class UpdateCompanyJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $cif,
        private CompanyRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Company
     */
    public function handle(): Company
    {
        if (!$company = $this->repository->find($this->id)) {
            throw new CompanyNotFound();
        }

        $data = [
            'name' => $this->name,
            'cif' => $this->cif,
        ];

        $this->repository->update($this->id, $data);
        $company->refresh();

        return $company;
    }
}
