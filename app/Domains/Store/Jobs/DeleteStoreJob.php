<?php

namespace App\Domains\Store\Jobs;

use App\Data\Repository\StoreRepositoryInterface;
use Lucid\Units\Job;

class DeleteStoreJob extends Job
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
     * @return bool
     */
    public function handle(): bool
    {
        return $this->repository->delete($this->id) > 0;
    }
}
