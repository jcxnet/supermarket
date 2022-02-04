<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Models\Customer;
use App\Data\Repository\CustomerRepositoryInterface;
use Lucid\Units\Job;

class GetCustomerJob extends Job
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
     * @return Customer
     */
    public function handle(): Customer
    {
        return $this->repository->find($this->id);
    }
}
