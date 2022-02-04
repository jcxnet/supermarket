<?php

namespace App\Domains\Order\Jobs;

use App\Data\Repository\OrderRepositoryInterface;
use Lucid\Units\Job;

class GetOrdersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private OrderRepositoryInterface $repository)
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
        $orders = $this->repository->all();

        return $orders->sortByDesc('created_at')->values()->all();
    }
}
