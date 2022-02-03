<?php

namespace App\Domains\Category\Jobs;

use App\Data\Repository\CategoryRepositoryInterface;
use Lucid\Units\Job;

class GetCategoriesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private CategoryRepositoryInterface $repository)
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
        $categories = $this->repository->all();

        return $categories->sortBy('name')->values()->all();
    }
}
