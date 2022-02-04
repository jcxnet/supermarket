<?php

namespace App\Domains\Store\Jobs;

use App\Data\Models\Store;
use App\Data\Repository\StoreRepositoryInterface;
use Lucid\Units\Job;

class SaveStoreJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private ?string $address,
        private ?string $url,
        private StoreRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Store
     */
    public function handle()
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'url' => $this->url,
        ];

        return $this->repository->create($attributes);
    }
}
