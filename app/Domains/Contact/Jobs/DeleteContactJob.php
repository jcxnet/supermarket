<?php

namespace App\Domains\Contact\Jobs;

use App\Data\Repository\ContactRepositoryInterface;
use Lucid\Units\Job;

class DeleteContactJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private ContactRepositoryInterface $repository
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
