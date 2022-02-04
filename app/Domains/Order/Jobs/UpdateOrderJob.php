<?php

namespace App\Domains\Order\Jobs;

use App\Data\Models\Order;
use App\Data\Repository\OrderRepositoryInterface;
use App\Domains\Order\Exceptions\OrderNotFound;
use Lucid\Units\Job;

class UpdateOrderJob extends Job
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
        if (!$order = $this->repository->find($this->id)) {
            throw new OrderNotFound();
        }

        $data = [
            'total' => $this->total,
        ];

        $this->repository->update($this->id, $data);
        $order->refresh();

        return $order;
    }
}
