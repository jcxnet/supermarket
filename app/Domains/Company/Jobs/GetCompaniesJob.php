<?php

namespace App\Domains\Company\Jobs;

use App\Data\Repository\CompanyRepositoryInterface;
use Lucid\Units\Job;

class GetCompaniesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private CompanyRepositoryInterface $repository)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle(): array
    {
        $companies = $this->repository->all();

        return $companies->sortBy('name')->values()->all();
    }
}
