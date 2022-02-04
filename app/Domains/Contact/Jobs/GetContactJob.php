<?php

namespace App\Domains\Contact\Jobs;

use App\Data\Models\Contact;
use App\Data\Repository\ContactRepositoryInterface;
use Lucid\Units\Job;

class GetContactJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private ContactRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Contact
     */
    public function handle(): Contact
    {
        return $this->repository->find($this->id);
    }
}
