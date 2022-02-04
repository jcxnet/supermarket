<?php

namespace App\Domains\Order\Jobs;

use App\Data\Models\Order;
use App\Data\Repository\OrderRepositoryInterface;
use Lucid\Units\Job;

class GetOrderJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private OrderRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Order
     */
    public function handle(): Order
    {
        return $this->repository->find($this->id);
    }
}
