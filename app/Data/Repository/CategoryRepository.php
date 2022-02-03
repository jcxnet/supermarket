<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $model;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function all(): array
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
        if (null == $category = $this->model->find($id)) {
            throw new ModelNotFoundException("Category not found");
        }

        return $category;
    }
}
