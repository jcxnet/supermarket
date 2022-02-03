<?php

namespace App\Domains\Store\Jobs;

use App\Data\Repository\StoreRepositoryInterface;
use Lucid\Units\Job;

class GetStoresJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private StoreRepositoryInterface $repository)
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
        $stores = $this->repository->all();

        return $stores->sortBy('name')->values()->all();
    }
}
