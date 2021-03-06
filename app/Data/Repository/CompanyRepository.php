<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Company;
use App\Domains\Company\Exceptions\CompanyNotFound;

class CompanyRepository implements CompanyRepositoryInterface
{

    protected $model;

    /**
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->model = $company;
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
        if (null == $company = $this->model->find($id)) {
            throw new CompanyNotFound();
        }

        return $company;
    }
}
