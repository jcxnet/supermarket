<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Category\Features\AddCategoryFeature;
use App\Domains\Category\Features\DeleteCategoryFeature;
use App\Domains\Category\Features\GetCategoriesFeature;
use App\Domains\Category\Features\GetCategoryFeature;
use App\Domains\Category\Features\UpdateCategoryFeature;
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
