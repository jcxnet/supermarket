<?php

namespace App\Domains\Store\Jobs;

use App\Data\Models\Store;
use App\Data\Repository\StoreRepositoryInterface;
use Lucid\Units\Job;

class GetStoreJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private StoreRepositoryInterface $repository
    ){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Store
    {
        return $this->repository->find($this->id);
    }
}
