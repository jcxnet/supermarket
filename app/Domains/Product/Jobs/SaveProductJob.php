<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use App\Data\Repository\ProductRepositoryInterface;
use Lucid\Units\Job;

class SaveProductJob extends Job
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
        private float $price,
        private ?string $description,
        private ProductRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Product
     */
    public function handle(): Product
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'description' => $this->description,
        ];

        return $this->repository->create($attributes);
    }
}
