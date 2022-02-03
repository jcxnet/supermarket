<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Services\Supermarket\Features\Category\AddCategoryFeature;
use App\Services\Supermarket\Features\Category\DeleteCategoryFeature;
use App\Services\Supermarket\Features\Category\GetCategoriesFeature;
use App\Services\Supermarket\Features\Category\GetCategoryFeature;
use App\Services\Supermarket\Features\Category\UpdateCategoryFeature;
use Lucid\Units\Controller;

class CategoryController extends Controller
{
    public function add()
    {
        return $this->serve(AddCategoryFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetCategoryFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetCategoriesFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateCategoryFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteCategoryFeature::class, ['id' => $id]);
    }
}
