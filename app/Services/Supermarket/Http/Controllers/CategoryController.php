<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Services\Supermarket\Features\Category\AddCategoryFeature;
use App\Services\Supermarket\Features\Category\GetCategoryFeature;
use Lucid\Units\Controller;

class CategoryController extends Controller
{
    public function add()
    {
        return $this->serve(AddCategoryFeature::class);
    }

    public function get()
    {
        return $this->serve(GetCategoryFeature::class);
    }
}
