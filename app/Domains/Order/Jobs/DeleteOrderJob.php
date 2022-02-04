<?php

namespace App\Domains\Order\Jobs;

use App\Data\Repository\OrderRepositoryInterface;
use Lucid\Units\Job;

class DeleteOrderJob extends Job
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
     * @return bool
     */
    public function handle(): bool
    {
        return $this->repository->delete($this->id) > 0;
    }
}
