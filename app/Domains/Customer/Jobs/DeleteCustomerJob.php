<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repository\CustomerRepositoryInterface;
use Lucid\Units\Job;

class DeleteCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private CustomerRepositoryInterface $repository
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
