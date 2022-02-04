<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repository\ProductRepositoryInterface;
use Lucid\Units\Job;

class GetProductsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private ProductRepositoryInterface $repository)
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
        $products = $this->repository->all();

        return $products->sortBy('name')->values()->all();
    }
}
