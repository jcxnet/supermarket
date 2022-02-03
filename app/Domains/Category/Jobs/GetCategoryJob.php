<?php

namespace App\Domains\Category\Jobs;

use App\Data\Models\Category;
use App\Data\Repository\CategoryRepositoryInterface;
use Lucid\Units\Job;

class GetCategoryJob extends Job
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
     * @return Category
     */
    public function handle(): Category
    {
       return $this->repository->find($this->id);
    }
}
