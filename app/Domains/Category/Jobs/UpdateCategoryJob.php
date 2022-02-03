<?php

namespace App\Domains\Category\Jobs;

use App\Data\Models\Category;
use App\Data\Repository\CategoryRepositoryInterface;
use App\Domains\Category\Exceptions\CategoryNotFound;
use App\Domains\Category\Exceptions\CategoryUpdateFail;
use Lucid\Units\Job;

class UpdateCategoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $slug,
        private ?string $description,
        private CategoryRepositoryInterface $repository
    )
    {}


    public function handle(): Category
    {
        if (!$category = $this->repository->find($this->id)) {
            throw new CategoryNotFound();
        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ];

        $this->repository->update($this->id, $data);
        $category->refresh();

        return $category;
    }
}
