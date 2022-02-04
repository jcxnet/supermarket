<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Models\Customer;
use App\Data\Repository\CustomerRepositoryInterface;
use Lucid\Units\Job;

class SaveCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private CustomerRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Customer
     */
    public function handle()
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];

        return $this->repository->create($attributes);
    }
}
