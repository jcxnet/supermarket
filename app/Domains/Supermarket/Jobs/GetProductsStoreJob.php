<?php

namespace App\Domains\Supermarket\Jobs;

use App\Data\Models\Store;
use App\Data\Repository\StoreRepositoryInterface;
use Lucid\Units\Job;

class GetProductsStoreJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private StoreRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Store
     */
    public function handle(): Store
    {
        return $this->repository->find($this->id);
    }
}
