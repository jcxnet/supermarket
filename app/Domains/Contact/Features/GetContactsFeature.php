<?php

namespace App\Domains\Contact\Features;

use App\Domains\Contact\Jobs\GetContactsJob;
use Lucid\Units\Feature;

class GetContactsFeature extends Feature
{
    public function handle()
    {
        $contacts = $this->run(GetContactsJob::class);

        return response()->json(['data' => $contacts]);
    }
}
