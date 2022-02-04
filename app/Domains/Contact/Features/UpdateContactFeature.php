<?php

namespace App\Domains\Contact\Features;

use App\Domains\Contact\Jobs\UpdateContactJob;
use App\Domains\Contact\Requests\UpdateContact;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateContactFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateContact $request)
    {
        $data = $request->validated();
        $contact = $this->run(
            UpdateContactJob::class, [
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'position' => $data['position'] ?? null,
        ]);

        return response()->json(['data' => $contact])->send();
    }
}
