<?php

namespace App\Domains\Contact\Jobs;

use App\Data\Models\Contact;
use App\Data\Repository\ContactRepositoryInterface;
use App\Domains\Contact\Exceptions\ContactNotFound;
use Lucid\Units\Job;

class UpdateContactJob extends Job
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
    public function handle(): Contact
    {
        if (!$contact = $this->repository->find($this->id)) {
            throw new ContactNotFound();
        }

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ?? $contact->phone,
            'position' => $this->position ?? $contact->position,
        ];

        $this->repository->update($this->id, $data);
        $contact->refresh();

        return $contact;
    }
}
