<?php

namespace App\Domains\Store\Jobs;

use App\Data\Models\Store;
use App\Data\Repository\StoreRepositoryInterface;
use App\Domains\Store\Exceptions\StoreNotFound;
use Lucid\Units\Job;

class UpdateStoreJob extends Job
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
    public function handle(): Store
    {
        if (!$store = $this->repository->find($this->id)) {
            throw new StoreNotFound();
        }

        $data = [
            'name' => $this->name,
            'address' => $this->address ?? $store->address,
            'url' => $this->url ?? $store->url,
        ];

        $this->repository->update($this->id, $data);
        $store->refresh();

        return $store;
    }
}
