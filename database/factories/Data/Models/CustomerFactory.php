<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Uuid::uuid4(),
            'name' => sprintf("%s %s", $this->faker->firstName(), $this->faker->lastName()),
            'email' => $this->faker->email(),
        ];
    }
}
