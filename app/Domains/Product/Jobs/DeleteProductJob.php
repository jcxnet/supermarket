<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repository\ProductRepositoryInterface;
use Lucid\Units\Job;

class DeleteProductJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private ProductRepositoryInterface $repository
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
