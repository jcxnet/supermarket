<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Contact\Features\AddContactFeature;
use App\Domains\Contact\Features\DeleteContactFeature;
use App\Domains\Contact\Features\GetContactFeature;
use App\Domains\Contact\Features\GetContactsFeature;
use App\Domains\Contact\Features\UpdateContactFeature;
use Lucid\Units\Controller;

class ContactController extends Controller
{
    public function add()
    {
        return $this->serve(AddContactFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetContactFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetContactsFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateContactFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteContactFeature::class, ['id' => $id]);
    }
}
