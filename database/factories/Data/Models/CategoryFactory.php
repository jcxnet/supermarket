<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->domainName();
        if ($pos = strpos($name, '.')) {
            $name = substr($name, 0, $pos-1);
        }
        return [
            'id' => Uuid::uuid4(),
            'name' => Str::of($name)->title(),
            'slug' => Str::of($name)->slug(),
            'description' => $this->faker->text(30),
        ];
    }
}
