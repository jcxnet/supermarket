<?php

namespace App\Domains\Contact\Features;

use App\Domains\Contact\Jobs\GetContactJob;
use App\Domains\Contact\Requests\GetContact;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetContactFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetContact $request)
    {
        $data = $request->validated();

        $contact = $this->run(
            GetContactJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => $contact]);
    }
}
