<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Models\Customer;
use App\Data\Repository\CustomerRepositoryInterface;
use App\Domains\Customer\Exceptions\CustomerNotFound;
use Lucid\Units\Job;

class UpdateCustomerJob extends Job
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
    public function handle(): Customer
    {
        if (!$customer = $this->repository->find($this->id)) {
            throw new CustomerNotFound();
        }

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        $this->repository->update($this->id, $data);
        $customer->refresh();

        return $customer;
    }
}
