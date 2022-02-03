<?php

namespace App\Domains\Category\Jobs;

use App\Data\Repository\CategoryRepositoryInterface;
use Lucid\Units\Job;

class DeleteCategoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private CategoryRepositoryInterface $repository
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
