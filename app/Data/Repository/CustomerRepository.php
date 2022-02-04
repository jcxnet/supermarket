<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Customer;
use App\Domains\Customer\Exceptions\CustomerNotFound;
use App\Domains\Store\Exceptions\StoreNotFound;

class CustomerRepository implements CustomerRepositoryInterface
{

    protected $model;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
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
        if (null == $customer = $this->model->find($id)) {
            throw new CustomerNotFound();
        }

        return $customer;
    }
}
