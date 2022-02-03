<?php

namespace App\Domains\Company\Jobs;

use App\Data\Repository\CompanyRepositoryInterface;
use Lucid\Units\Job;

class DeleteCompanyJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private CompanyRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->repository->delete($this->id) > 0;
    }
}
