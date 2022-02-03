<?php

namespace App\Domains\Contact\Jobs;

use App\Data\Models\Contact;
use App\Data\Repository\ContactRepositoryInterface;
use Lucid\Units\Job;

class SaveContactJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private ?string $phone,
        private ?string $position,
        private ContactRepositoryInterface $repository
    )
    {}

    /**
     * Execute the job.
     *
     * @return Contact
     */
    public function handle()
    {
        $attributes = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
        ];

        return $this->repository->create($attributes);
    }
}
