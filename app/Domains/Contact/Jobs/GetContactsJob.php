<?php

namespace App\Domains\Contact\Jobs;

use App\Data\Repository\ContactRepositoryInterface;
use Lucid\Units\Job;

class GetContactsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private ContactRepositoryInterface $repository)
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
        $contacts = $this->repository->all();

        return $contacts->sortBy('name')->values()->all();
    }
}
