<?php

namespace App\Domains\Contact\Features;

use App\Domains\Contact\Jobs\DeleteContactJob;
use App\Domains\Contact\Requests\DeleteContact;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteContactFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteContact $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteContactJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();

    }
}
