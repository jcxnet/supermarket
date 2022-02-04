<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use App\Data\Repository\ProductRepositoryInterface;
use Lucid\Units\Job;

class GetProductJob extends Job
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
     * @return Product
     */
    public function handle(): Product
    {
        return $this->repository->find($this->id);
    }
}
