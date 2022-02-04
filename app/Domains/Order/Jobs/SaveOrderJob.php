<?php

namespace App\Domains\Order\Jobs;

use App\Data\Models\Order;
use App\Data\Repository\OrderRepositoryInterface;
use Lucid\Units\Job;

class SaveOrderJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private float $total,
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
        $attributes = [
            'id' => $this->id,
            'total' => $this->total,
        ];

        return $this->repository->create($attributes);
    }
}
