<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Contact;
use App\Domains\Contact\Exceptions\ContactNotFound;

class ContactRepository implements ContactRepositoryInterface
{

    protected $model;

    /**
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        $this->model->fill($data)->save();

        return $this->model;
    }

    public function update(string $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete(string $id)
    {
        return $this->model->destroy($id);
    }

    public function find(string $id)
    {
        if (null == $contact = $this->model->find($id)) {
            throw new ContactNotFound();
        }

        return $contact;
    }
}
