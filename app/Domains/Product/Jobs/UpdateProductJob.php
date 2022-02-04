<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use App\Data\Repository\ProductRepositoryInterface;
use App\Domains\Product\Exceptions\ProductNotFound;
use Lucid\Units\Job;

class UpdateProductJob extends Job
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
        if (!$product = $this->repository->find($this->id)) {
            throw new ProductNotFound();
        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'description' => $this->description ?? $product->description,
        ];

        $this->repository->update($this->id, $data);
        $product->refresh();

        return $product;
    }
}
