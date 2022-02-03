<?php

namespace App\Domains\Category\Jobs;

use App\Data\Models\Category;
use Lucid\Units\Job;

class SaveCategoryJob extends Job
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
        private ?string $description
    )
    {}

    /**
     * Execute the job.
     *
     * @return Category
     */
    public function handle(): Category
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ];

        return tap(new Category($attributes))->save();
    }
}
