<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repository\CustomerRepositoryInterface;
use Lucid\Units\Job;

class GetCustomersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private CustomerRepositoryInterface $repository)
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
        $customers = $this->repository->all();

        return $customers->sortBy('name')->values()->all();
    }
}
