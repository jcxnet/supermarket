<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use App\Data\Repository\CompanyRepositoryInterface;
use Lucid\Units\Job;

class GetCompanyJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private CompanyRepositoryInterface $repository
    ){}

    /**
     * Execute the job.
     *
     * @return Company
     */
    public function handle(): Company
    {
        return $this->repository->find($this->id);
    }
}
