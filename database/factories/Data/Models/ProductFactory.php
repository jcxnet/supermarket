<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        return [
            'id' => Uuid::uuid4(),
            'name' => Str::of($name)->title(),
            'slug' => Str::of($name)->slug(),
            'price' => $this->faker->randomFloat(2,10,100),
            'description' => $this->faker->text(30),
        ];
    }
}
