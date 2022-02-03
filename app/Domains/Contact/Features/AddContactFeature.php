<?php

namespace App\Domains\Contact\Features;

use App\Domains\Contact\Jobs\SaveContactJob;
use App\Domains\Contact\Requests\AddContact;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddContactFeature extends Feature
{
    public function handle(AddContact $request)
    {
        $data = $request->validated();

        $contact = $this->run(
            SaveContactJob::class, [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'position' => $data['position'] ?? null,
        ]);

        return response()->json(['data' => $contact]);
    }
}
