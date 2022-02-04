<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use App\Data\Repository\CompanyRepositoryInterface;
use Lucid\Units\Job;

class SaveCompanyJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $cif,
        private CompanyRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Company
     */
    public function handle()
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'cif' => $this->cif,
        ];

        return $this->repository->create($attributes);
    }
}
