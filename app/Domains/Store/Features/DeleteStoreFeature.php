<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\DeleteStoreJob;
use App\Domains\Store\Requests\DeleteStore;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteStoreFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteStore $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteStoreJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
