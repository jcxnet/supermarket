<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Uuid::uuid4(),
            'total' => $this->faker->randomFloat(2,100,1000),
        ];
    }
}
